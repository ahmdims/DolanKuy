<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Culture;
use App\Models\Like;
use App\Models\History;
use App\Models\Comment;
use App\Models\Image;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CultureController extends Controller
{
    public function index()
    {
        $culture = Culture::withCount('comments')->get();

        return view('app.culture.index', compact('culture'));
    }

    public function show($slug)
    {
        $detail = Culture::where('slug', $slug)->firstOrFail();

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

        return view('app.culture.detail', [
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

        $culture = Culture::where('slug', $slug)->firstOrFail();

        Comment::create([
            'user_id' => auth()->id(),
            'commentable_id' => $culture->id,
            'commentable_type' => Culture::class,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Comment added successfully!');
    }

    public function like($slug)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $culture = Culture::where('slug', $slug)->firstOrFail();

        $likeExists = Like::where('user_id', auth()->id())
            ->where('entity_id', $culture->id)
            ->where('entity_type', 'culture')
            ->exists();

        if (!$likeExists) {
            Like::create([
                'user_id' => auth()->id(),
                'entity_id' => $culture->id,
                'entity_type' => 'culture',
            ]);

            $culture->likes_count = $culture->likes()->count();
        } else {
            Like::where('user_id', auth()->id())
                ->where('entity_id', $culture->id)
                ->where('entity_type', 'culture')
                ->delete();

            $culture->likes_count = $culture->likes()->count();
        }

        $culture->save();
        return back();
    }

    public function history($slug)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $culture = Culture::where('slug', $slug)->firstOrFail();

        $historyExists = History::where('user_id', auth()->id())
            ->where('entity_id', $culture->id)
            ->where('entity_type', 'culture')
            ->exists();

        if (!$historyExists) {
            History::create([
                'user_id' => auth()->id(),
                'entity_id' => $culture->id,
                'entity_type' => 'culture',
            ]);

            $culture->histories_count = $culture->histories()->count();
        } else {
            History::where('user_id', auth()->id())
                ->where('entity_id', $culture->id)
                ->where('entity_type', 'culture')
                ->delete();

            $culture->histories_count = $culture->histories()->count();
        }

        $culture->save();
        return back();
    }

    public function admin()
    {
        $culture = Culture::with('images')->get();
        return view('admin.culture.index', compact('culture'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'styles' => 'nullable|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $slug = Str::slug($request->name);
        $culture = Culture::create(array_merge($request->all(), ['slug' => $slug]));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $imageName = time() . '-' . $imageFile->getClientOriginalName();

                $path = $imageFile->storeAs('', $imageName, 'public');

                $culture->images()->create([
                    'path' => $path,
                ]);
            }
        }

        return redirect()->route('admin.culture.index')->with('success', 'Berhasil dibuat, cuy!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'styles' => 'nullable|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $culture = Culture::findOrFail($id);

        // Update slug hanya jika nama diisi
        if ($request->filled('name')) {
            $culture->slug = Str::slug($request->name);
        }

        // Update detail destinasi, kecuali images
        $culture->update($request->except(['images']));

        // Tambahkan gambar baru tanpa menghapus gambar lama
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                // Simpan gambar ke storage/public
                $path = $imageFile->store('', 'public');

                // Simpan path gambar menggunakan relasi polymorphic
                $culture->images()->create([
                    'path' => $path,
                ]);
            }
        }

        return redirect()->route('admin.culture.index')->with('success', 'Berhasil diperbarui, cuy!');
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
        $culture = Culture::findOrFail($id);

        foreach ($culture->images as $image) {
            if (file_exists(public_path($image->path))) {
                unlink(public_path($image->path));
            }
            $image->delete();
        }

        $culture->delete();

        return redirect()->route('admin.culture.index')->with('success', 'Berhasil dihapus, sob!');
    }
}
