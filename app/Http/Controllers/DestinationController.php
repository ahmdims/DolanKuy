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
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',  // Validasi gambar
        ]);

        $slug = Str::slug($request->name);
        $destination = Destination::create(array_merge($request->all(), ['slug' => $slug]));

        // Handle image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                // Generate a unique name for the image
                $imageName = time() . '-' . $imageFile->getClientOriginalName();

                // Simpan gambar langsung ke storage
                $path = $imageFile->storeAs('', $imageName, 'public'); // Menyimpan gambar ke storage/public

                // Simpan path gambar menggunakan relasi polymorphic
                $destination->images()->create([
                    'path' => $path,  // Simpan path relatif ke storage
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

        // Update slug hanya jika nama diisi
        if ($request->filled('name')) {
            $destination->slug = Str::slug($request->name);
        }

        // Update detail destinasi, kecuali images
        $destination->update($request->except(['images']));

        // Handle image uploads
        if ($request->hasFile('images')) {
            // Delete old images
            foreach ($destination->images as $image) {
                if (file_exists(public_path($image->path))) {
                    unlink(public_path($image->path));
                }
                $image->delete();
            }

            // Store new images
            foreach ($request->file('images') as $imageFile) {
                // Simpan gambar ke storage/public
                $path = $imageFile->store('', 'public'); // Menyimpan gambar langsung ke storage/public

                // Simpan path gambar menggunakan relasi polymorphic
                $destination->images()->create([
                    'path' => $path,  // Simpan path relatif ke storage
                ]);
            }
        }

        return redirect()->route('admin.destination.index')->with('success', 'Destination updated successfully.');
    }
    

    public function show($id)
{
    $destinasi_data = Destination::with('images')->findOrFail($id);
    return view('admin.destination.show', compact('destinasi_data'));
}

    public function destroy($id)
    {
        $destination = Destination::findOrFail($id);
        $destination->delete();

        return redirect()->route('admin.destination.index')->with('success', 'Destination deleted successfully.');
    }
}
