<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('admin.produk.produk', compact('produk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ProdukID' => 'nullable|string|max:12',
            'NamaProduk' => 'nullable|string|max:255',
            'Harga' => 'nullable|string|max:11',
            'Stok' => 'nullable|string|max:11',
        ]);

        Produk::create($request->all());

        return redirect()->route('produk.index')->with('success', 'Created successfully.');
    }

    public function update(Request $request, $id_produk)
    {
        $request->validate([
            'ProdukID' => 'nullable|string|max:12',
            'NamaProduk' => 'nullable|string|max:255',
            'Harga' => 'nullable|string|max:11',
            'Stok' => 'nullable|string|max:11',
        ]);

        $produk = Produk::find($id_produk);
        $produk->update($request->all());

        return redirect()->route('produk.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id_produk)
    {
        $produk = Produk::find($id_produk);
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Deleted successfully.');
    }
}