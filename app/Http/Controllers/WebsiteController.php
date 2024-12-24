<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        $website = Website::first();
        return view('admin.website.index', compact('website'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'phone' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string|max:255',
        ]);

        $website = Website::first();

        if ($website) {
            $website->phone = $request->phone;
            $website->email = $request->email;
            $website->address = $request->address;
            $website->save();

            return redirect()->route('admin.website.index')->with('success', 'Kontak berhasil diperbarui!');
        }
    }
}
