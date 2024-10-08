<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $supplier = Supplier::all();
        return view('admin.supplier.supplier', compact('supplier'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_supplier' => 'nullable|string|max:15',
            'nama_supplier' => 'nullable|string|max:50',
            'alamat' => 'nullable|string|max:150',
            'no_telepon' => 'nullable|string|max:100',
            'jumlah_populasi' => 'nullable|integer',
        ]);

        Supplier::create($request->all());

        return redirect()->route('supplier.index')->with('success', 'Created successfully.');
    }

    public function update(Request $request, $id_supplier)
    {
        $request->validate([
            'nama_supplier' => 'nullable|string|max:50',
            'alamat' => 'nullable|string|max:150',
            'no_telepon' => 'nullable|string|max:100',
            'jumlah_populasi' => 'nullable|integer',
        ]);

        $supplier = Supplier::find($id_supplier);
        $supplier->update($request->all());

        return redirect()->route('supplier.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id_supplier)
    {
        $supplier = Supplier::find($id_supplier);
        $supplier->delete();

        return redirect()->route('supplier.index')->with('success', 'Deleted successfully.');
    }
}