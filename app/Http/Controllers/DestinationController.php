<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Like;
use App\Models\History;
use App\Models\Comment;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DestinationController extends Controller
{
    public function index()
    {
        $destination = Destination::withCount('comments')->get();

        return view('app.destination.index', compact('destination'));
    }

    public function show($slug)
    {
        $detail = Destination::where('slug', $slug)->firstOrFail();

        $detail->increment('view_count');

        $apiKey = env('WEATHER_API_KEY');
        $url = "http://api.weatherapi.com/v1/current.json?key={$apiKey}&q={$detail->city}&aqi=no";

        $client = new Client();
        try {
            $response = $client->get($url);
            $weatherData = json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            $weatherData = null;
        }

        $comments = $detail->comments()->with('user')->latest()->get();
        $totalComments = $detail->commentCount();

        return view('app.destination.detail', [
            'detail' => $detail,
            'weatherData' => $weatherData,
            'comments' => $comments,
            'totalComments' => $totalComments,
            'isLoggedIn' => auth()->check()
        ]);
    }

    public function storeComment(Request $request, $slug)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to comment.');
        }

        $request->validate([
            'comment' => 'required|string|max:500',
        ]);

        $destination = Destination::where('slug', $slug)->firstOrFail();

        Comment::create([
            'user_id' => auth()->id(),
            'commentable_id' => $destination->id,
            'commentable_type' => Destination::class,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Comment added successfully!');
    }

    public function like($slug)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $destination = Destination::where('slug', $slug)->firstOrFail();

        $likeExists = Like::where('user_id', auth()->id())
            ->where('entity_id', $destination->id)
            ->where('entity_type', 'destination')
            ->exists();

        if (!$likeExists) {
            Like::create([
                'user_id' => auth()->id(),
                'entity_id' => $destination->id,
                'entity_type' => 'destination',
            ]);

            $destination->likes_count = $destination->likes()->count();
        } else {
            Like::where('user_id', auth()->id())
                ->where('entity_id', $destination->id)
                ->where('entity_type', 'destination')
                ->delete();

            $destination->likes_count = $destination->likes()->count();
        }

        $destination->save();
        return back();
    }

    public function history($slug)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $destination = Destination::where('slug', $slug)->firstOrFail();

        $historyExists = History::where('user_id', auth()->id())
            ->where('entity_id', $destination->id)
            ->where('entity_type', 'destination')
            ->exists();

        if (!$historyExists) {
            History::create([
                'user_id' => auth()->id(),
                'entity_id' => $destination->id,
                'entity_type' => 'destination',
            ]);

            $destination->histories_count = $destination->histories()->count();
        } else {
            History::where('user_id', auth()->id())
                ->where('entity_id', $destination->id)
                ->where('entity_type', 'destination')
                ->delete();

            $destination->histories_count = $destination->histories()->count();
        }

        $destination->save();
        return back();
    }

    public function admin()
    {
        $destination = Destination::with('images')->get();
        return view('admin.destination.index', compact('destination'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'link' => 'required|string',
            'opening_time' => 'required|string|max:255',
            'closing_time' => 'required|string|max:255',
            'price_min' => 'required|integer',
            'price_max' => 'required|integer',
            'facilities' => 'nullable|string',
            'contact' => 'nullable|string|max:255',
            'styles' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $slug = Str::slug($request->name);
        $destination = Destination::create(array_merge($request->all(), ['slug' => $slug]));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $imageName = time() . '-' . $imageFile->getClientOriginalName();

                $path = $imageFile->storeAs('', $imageName, 'public');

                $destination->images()->create([
                    'path' => $path,
                ]);
            }
        }

        return redirect()->route('admin.destination.index')->with('success', 'Berhasil dibuat, cuy!');
    }

    public function edit($id)
    {
        $destination = Destination::findOrFail($id);
        return response()->json($destination);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'province' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'link' => 'nullable|string',
            'opening_time' => 'nullable|string|max:255',
            'closing_time' => 'nullable|string|max:255',
            'price_min' => 'nullable|integer',
            'price_max' => 'nullable|integer',
            'facilities' => 'nullable|string',
            'contact' => 'nullable|string|max:255',
            'styles' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $destination = Destination::findOrFail($id);

        if ($request->filled('name')) {
            $destination->slug = Str::slug($request->name);
        }

        $destination->update($request->except(['images']));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $path = $imageFile->store('', 'public');

                $destination->images()->create([
                    'path' => $path,
                ]);
            }
        }

        return redirect()->route('admin.destination.index')->with('success', 'Berhasil diperbarui, cuy!');
    }

    public function destroy($id)
    {
        $destination = Destination::findOrFail($id);

        foreach ($destination->images as $image) {
            if (file_exists(public_path($image->path))) {
                unlink(public_path($image->path));
            }
            $image->delete();
        }

        $destination->delete();

        return redirect()->route('admin.destination.index')->with('success', 'Berhasil dihapus, sob!');
    }
}
