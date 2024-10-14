<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TouristController extends Controller
{
    public function adminIndex()
    {
        $users = User::all();
        return view('admin.tourist.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => [
                'required',
                'string',
                'unique:users,username',
                'max:255',
                'regex:/^[a-z0-9_.]+$/',
            ],
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'utype' => 'required|string|in:superadmin,admin_wisata,admin_umkm,admin_budaya,pengunjung',
            'password' => 'required|string|min:8|max:255',
        ], [
            'username.required' => 'Nama Pengguna wajib diisi, cuy!',
            'username.unique' => 'Aduh, username udah dipakai yang lain.',
            'username.regex' => 'Nama Pengguna cuma boleh pakai a-z, 0-9, _ , . (tanpa spasi ya!)',
            'name.required' => 'Nama wajib diisi, cuy!',
            'email.required' => 'Emailnya jangan lupa diisi dong!',
            'email.email' => 'Hmm, format emailnya ga valid nih. Cek lagi!',
            'email.unique' => 'Waduh, email udah terdaftar. Cari email lain deh!',
            'password.required' => 'Password-nya kudu diisi, sob!',
            'password.min' => 'Password minimal 8 karakter biar aman, oke!',
        ]);

        $user = User::create([
            'username' => strtolower($request->username),
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'utype' => $request->utype,
        ]);

        event(new Registered($user));

        return redirect()->route('admin.tourist.index')->with('success', 'Berhasil dibuat, cuy!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => [
                'nullable',
                'string',
                'unique:users,username,' . $id,
                'max:255',
                'regex:/^[a-zA-Z0-9_.]+$/',
            ],
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'utype' => 'nullable|string',
        ], [
            'username.required' => 'Nama Pengguna wajib diisi, cuy!',
            'username.unique' => 'Aduh, username udah dipakai yang lain.',
            'username.regex' => 'Nama Pengguna cuma boleh pakai a-z, 0-9, _ , . (tanpa spasi ya!)',
            'name.required' => 'Nama wajib diisi, cuy!',
            'email.required' => 'Emailnya jangan lupa diisi dong!',
            'email.email' => 'Hmm, format emailnya ga valid nih. Cek lagi!',
            'email.unique' => 'Waduh, email udah terdaftar. Cari email lain deh!',
            'password.required' => 'Password-nya kudu diisi, sob!',
            'password.min' => 'Password minimal 8 karakter biar aman, oke!',
        ]);

        $user = User::find($id);
        if ($user) {
            $user->update($request->all());
            return redirect()->route('admin.tourist.index')->with('success', 'Berhasil diperbarui, cuy!');
        } else {
            return redirect()->route('admin.tourist.index')->with('error', 'Pengguna tidak ditemukan, cuy!');
        }
    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $user->delete();

        return redirect()->route('admin.tourist.index')->with('success', 'Berhasil dihapus, sob!');
    }
}