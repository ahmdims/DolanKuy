<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index()
    {
        $destination = Destination::all();
        return view('admin.destination.index', compact('destination'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_destinasi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'alamat' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'jam_buka' => 'required|string|max:255',
            'jam_tutup' => 'required|string|max:255',
            'harga_tiket' => 'required|numeric',
            'fasilitas' => 'nullable|string',
            'kontak' => 'nullable|string|max:255',
            'rating_rata_rata' => 'nullable|numeric',
        ]);

        Destination::create($request->all());

        return redirect()->route('admin.destination.index')->with('success', 'Destination created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_destinasi' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string|max:255',
            'kota' => 'nullable|string|max:255',
            'provinsi' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'jam_buka' => 'nullable|string|max:255',
            'jam_tutup' => 'nullable|string|max:255',
            'harga_tiket' => 'nullable|numeric',
            'fasilitas' => 'nullable|string',
            'kontak' => 'nullable|string|max:255',
        ]);

        $destination = Destination::findOrFail($id);
        $destination->update($request->all());

        return redirect()->route('admin.destination.index')->with('success', 'Destination updated successfully.');
    }

    public function destroy($id)
    {
        $destination = Destination::findOrFail($id);
        $destination->delete();

        return redirect()->route('admin.destination.index')->with('success', 'Destination deleted successfully.');
    }
}
