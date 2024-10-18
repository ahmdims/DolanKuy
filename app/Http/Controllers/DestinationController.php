<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DestinationController extends Controller
{
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
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'opening_time' => 'required|string|max:255',
            'closing_time' => 'required|string|max:255',
            'ticket_price' => 'required|numeric',
            'facilities' => 'nullable|string',
            'contact' => 'nullable|string|max:255',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $slug = Str::slug($request->name);
        $destination = Destination::create(array_merge($request->all(), ['slug' => $slug]));

        // Handle image uploads
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
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $destination = Destination::findOrFail($id);

        if ($request->filled('name')) {
            $destination->slug = Str::slug($request->name);
        }

        $destination->update($request->except(['images', 'existing_images']));

        // Handle image uploads
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
    // Cari gambar berdasarkan ID
    $image = Image::findOrFail($id);

    // Akses file dari storage 'public/storage'
    $filePath = storage_path('app/public/' . $image->path);

    // Cek apakah file ada di sistem
    if (file_exists($filePath)) {
        // Hapus file dari storage
        unlink($filePath);
    } else {
        // Jika file tidak ditemukan, kirim pesan error
        return response()->json([
            'success' => false,
            'message' => 'File not found in storage'
        ], 404);
    }

    // Hapus record gambar dari database
    $image->delete();

    // Kirimkan respons sukses
    return response()->json([
        'success' => true,
        'message' => 'Image successfully deleted'
    ]);
}


    public function show($id)
    {
        $destinasi_data = Destination::with('images')->findOrFail($id);
        return view('admin.destination.show', compact('destinasi_data'));
    }

    public function destroy($id)
    {
        $destination = Destination::findOrFail($id);

        foreach ($destination->images as $image) {
            if (file_exists(public_path($image->path))) {
                unlink(public_path($image->path)); // Hapus file fisik
            }
            $image->delete(); // Hapus record dari database
        }

        $destination->delete();

        return redirect()->route('admin.destination.index')->with('success', 'Destination deleted successfully.');
    }
}
