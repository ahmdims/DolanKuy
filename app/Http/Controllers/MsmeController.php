<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Msme;
use App\Models\Like;
use App\Models\History;
use App\Models\Comment;
use App\Models\Image;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MsmeController extends Controller
{
    public function index()
    {
        $msme = Msme::withCount('comments')->get();

        return view('app.msme.index', compact('msme'));
    }

    public function show($slug)
    {
        $detail = Msme::where('slug', $slug)->firstOrFail();

        // Increment view count
        $detail->increment('view_count');

        // Fetch weather data
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

        return view('app.msme.detail', [
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

        $msme = Msme::where('slug', $slug)->firstOrFail();

        Comment::create([
            'user_id' => auth()->id(),
            'commentable_id' => $msme->id,
            'commentable_type' => Msme::class,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Comment added successfully!');
    }

    public function like($slug)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $msme = Msme::where('slug', $slug)->firstOrFail();

        $likeExists = Like::where('user_id', auth()->id())
            ->where('entity_id', $msme->id)
            ->where('entity_type', 'msme')
            ->exists();

        if (!$likeExists) {
            Like::create([
                'user_id' => auth()->id(),
                'entity_id' => $msme->id,
                'entity_type' => 'msme',
            ]);

            $msme->likes_count = $msme->likes()->count();
        } else {
            Like::where('user_id', auth()->id())
                ->where('entity_id', $msme->id)
                ->where('entity_type', 'msme')
                ->delete();

            $msme->likes_count = $msme->likes()->count();
        }

        $msme->save();
        return back();
    }

    public function history($slug)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $msme = Msme::where('slug', $slug)->firstOrFail();

        $historyExists = History::where('user_id', auth()->id())
            ->where('entity_id', $msme->id)
            ->where('entity_type', 'msme')
            ->exists();

        if (!$historyExists) {
            History::create([
                'user_id' => auth()->id(),
                'entity_id' => $msme->id,
                'entity_type' => 'msme',
            ]);

            $msme->histories_count = $msme->histories()->count();
        } else {
            History::where('user_id', auth()->id())
                ->where('entity_id', $msme->id)
                ->where('entity_type', 'msme')
                ->delete();

            $msme->histories_count = $msme->histories()->count();
        }

        $msme->save();
        return back();
    }

    public function admin()
    {
        $msme = Msme::with('images')->get();
        return view('admin.msme.index', compact('msme'));
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
            'styles' => 'string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        $slug = Str::slug($request->name);
        $msme = Msme::create(array_merge($request->all(), ['slug' => $slug]));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $imageName = time() . '-' . $imageFile->getClientOriginalName();

                $path = $imageFile->storeAs('', $imageName, 'public');

                $msme->images()->create([
                    'path' => $path,
                ]);
            }
        }

        return redirect()->route('admin.msme.index')->with('success', 'Berhasil dibuat, cuy!');
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
            'styles' => 'string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $msme = Msme::findOrFail($id);

        // Update slug hanya jika nama diisi
        if ($request->filled('name')) {
            $msme->slug = Str::slug($request->name);
        }

        // Update detail destinasi, kecuali images
        $msme->update($request->except(['images']));

        // Tambah foto baru tanpa menghapus foto lama
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                // Simpan gambar ke storage/public/images
                $path = $imageFile->store('images', 'public');

                // Simpan path gambar menggunakan relasi polymorphic
                $msme->images()->create([
                    'path' => $path,
                ]);
            }
        }

        return redirect()->route('admin.msme.index')->with('success', 'Berhasil diperbarui, cuy!');
    }


    public function deleteImage($id)
    {
        $image = Image::findOrFail($id);

        $filePath = storage_path('app/public/' . $image->path);

        if (file_exists($filePath)) {
            unlink($filePath);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'File not found in storage'
            ], 404);
        }

        $image->delete();

        return response()->json([
            'success' => true,
            'message' => 'Image successfully deleted'
        ]);
    }

    public function destroy($id)
    {
        $msme = Msme::findOrFail($id);

        foreach ($msme->images as $image) {
            if (file_exists(public_path($image->path))) {
                unlink(public_path($image->path));
            }
            $image->delete();
        }

        $msme->delete();

        return redirect()->route('admin.msme.index')->with('success', 'Berhasil dihapus, sob!');
    }
}
