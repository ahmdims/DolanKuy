<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Like;
use App\Models\History;
use App\Models\Comment;
use App\Models\Image;
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
        $user = Auth::user();

        if ($user->utype === 'superadmin') {
            $destination = Destination::with('images')->get();
        } else {
            $destination = Destination::with('images')->where('user_id', $user->id)->get();
        }

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
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'opening_time' => 'required|string|max:255',
            'closing_time' => 'required|string|max:255',
            'ticket_price' => 'required|numeric',
            'facilities' => 'nullable|string',
            'contact' => 'nullable|string|max:255',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:10240',
        ], [
            'name.required' => 'Nama destinasi wajib diisi.',
            'name.string' => 'Nama destinasi harus berupa string.',
            'name.max' => 'Nama destinasi tidak boleh lebih dari 255 karakter.',
            'description.required' => 'Deskripsi wajib diisi.',
            'description.string' => 'Deskripsi harus berupa string.',
            'address.required' => 'Alamat wajib diisi.',
            'address.string' => 'Alamat harus berupa string.',
            'address.max' => 'Alamat tidak boleh lebih dari 255 karakter.',
            'city.required' => 'Kota wajib diisi.',
            'city.string' => 'Kota harus berupa string.',
            'city.max' => 'Kota tidak boleh lebih dari 255 karakter.',
            'province.required' => 'Provinsi wajib diisi.',
            'province.string' => 'Provinsi harus berupa string.',
            'province.max' => 'Provinsi tidak boleh lebih dari 255 karakter.',
            'latitude.numeric' => 'Latitude harus berupa angka.',
            'longitude.numeric' => 'Longitude harus berupa angka.',
            'opening_time.required' => 'Waktu buka wajib diisi.',
            'opening_time.string' => 'Waktu buka harus berupa string.',
            'opening_time.max' => 'Waktu buka tidak boleh lebih dari 255 karakter.',
            'closing_time.required' => 'Waktu tutup wajib diisi.',
            'closing_time.string' => 'Waktu tutup harus berupa string.',
            'closing_time.max' => 'Waktu tutup tidak boleh lebih dari 255 karakter.',
            'ticket_price.required' => 'Harga tiket wajib diisi.',
            'ticket_price.numeric' => 'Harga tiket harus berupa angka.',
            'facilities.string' => 'Fasilitas harus berupa string.',
            'contact.string' => 'Kontak harus berupa string.',
            'contact.max' => 'Kontak tidak boleh lebih dari 255 karakter.',
            'images.required' => 'Gambar wajib diunggah.',
            'images.*.image' => 'File harus berupa gambar.',
            'images.*.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'images.*.max' => 'Ukuran gambar tidak boleh lebih dari 10 MB.',
        ]);        

        $slug = Str::slug($request->name);

        $destination = Destination::create(array_merge($request->all(), [
            'slug' => $slug,
            'user_id' => auth()->id(),
        ]));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $imageName = time() . '-' . $imageFile->getClientOriginalName();
                $path = $imageFile->storeAs('', $imageName, 'public');

                $destination->images()->create([
                    'path' => $path,
                ]);
            }
        }

        return redirect()->route('admin.destination.index')->with('success', 'Destination created successfully.');
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
            'opening_time' => 'nullable|string|max:255',
            'closing_time' => 'nullable|string|max:255',
            'ticket_price' => 'nullable|numeric',
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

        $destination = Destination::findOrFail($id);

        if ($request->filled('name')) {
            $destination->slug = Str::slug($request->name);
        }

        $destination->update($request->except(['images', 'existing_images']));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $path = $imageFile->store('', 'public');
                $destination->images()->create(['path' => $path]);
            }
        }

        return redirect()->route('admin.destination.index')->with('success', 'Destination updated successfully.');
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
        $destination = Destination::findOrFail($id);

        foreach ($destination->images as $image) {
            if (file_exists(public_path($image->path))) {
                unlink(public_path($image->path));
            }
            $image->delete();
        }

        $destination->delete();

        return redirect()->route('admin.destination.index')->with('success', 'Destination deleted successfully.');
    }
}