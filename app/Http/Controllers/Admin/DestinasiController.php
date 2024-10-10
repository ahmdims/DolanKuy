<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destinasi;
use Illuminate\Http\Request;

class DestinasiController extends Controller
{
    public function index()
    {
        $destinasi_wisata = Destinasi::all();
        return view('admin.destinasi.index', compact('destinasi_wisata'));  // Pastikan view file ini ada dan sesuai
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

        Destinasi::create($request->all());

        return redirect()->route('destinasi.index')->with('success', 'Destinasi created successfully.');
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
            'rating_rata_rata' => 'nullable|numeric',
        ]);

        $destinasi = Destinasi::findOrFail($id);
        $destinasi->update($request->all());

        return redirect()->route('destinasi.index')->with('success', 'Destinasi updated successfully.');
    }

    public function destroy($id)
    {
        $destinasi = Destinasi::findOrFail($id);
        $destinasi->delete();

        return redirect()->route('destinasi.index')->with('success', 'Destinasi deleted successfully.');
    }
}
