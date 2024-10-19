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
        $user = Auth::user();

        if ($user->utype === 'superadmin') {
            $culture = Culture::with('images')->get();
        } else {
            $culture = Culture::with('images')->where('user_id', $user->id)->get();
        }

        return view('admin.culture.index', compact('culture'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'facilities' => 'nullable|string',
            'contact' => 'nullable|string|max:255',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        // Menghasilkan slug untuk destinasi
        $slug = Str::slug($request->name);


        // Mengambil user_id dari pengguna yang sedang terautentikasi
        $userId = auth()->id();
        if (!$userId) {
            return redirect()->back()->withErrors(['user_id' => 'User is not authenticated.']);
        }

        // Membuat destinasi baru dengan menyimpan data yang relevan
        $culture = Culture::create(array_merge($request->except('images'), [
            'slug' => $slug,
            'user_id' => $userId, // Pastikan user_id diatur di sini
        ]));

        // Menyimpan gambar jika ada
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $imageName = time() . '-' . $imageFile->getClientOriginalName();
                $path = $imageFile->storeAs('', $imageName, 'public');

                // Simpan path gambar ke dalam model Image terkait dengan culture
                $culture->images()->create([
                    'path' => $path,
                ]);
            }
        }

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.culture.index')->with('success', 'Culture created successfully.');
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
            'facilities' => 'nullable|string',
            'contact' => 'nullable|string|max:255',
            'images' => 'required_without:existing_images',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:10240',
        ], [
            'images.required_without' => 'Setidaknya satu gambar harus diunggah.',
            'images.*.image' => 'File yang diunggah harus berupa gambar.',
            'images.*.mimes' => 'Gambar harus berformat jpeg, png, jpg, atau gif.',
            'images.*.max' => 'Ukuran gambar maksimal adalah 10MB.',
        ]);

        $culture = Culture::findOrFail($id);

        if ($request->filled('name')) {
            $culture->slug = Str::slug($request->name);
        }

        $culture->update($request->except(['images', 'existing_images']));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $path = $imageFile->store('', 'public');
                $culture->images()->create(['path' => $path]);
            }
        }

        return redirect()->route('admin.culture.index')->with('success', 'Culture updated successfully.');
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

        return redirect()->route('admin.culture.index')->with('success', 'Culture deleted successfully.');
    }
}
