<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
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
                'regex:/^[a-zA-Z0-9_.]+$/',
            ],
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',  // Tambahkan validasi unique
            'role' => 'required|string|in:superadmin,admin_wisata,admin_umkm,admin_budaya,pengunjung',
            'password' => 'required|string|max:255',
        ], [
            'username.required' => 'The username is required.',
            'username.unique' => 'The username has already been taken.',
            'username.regex' => 'The username may only contain letters, numbers, underscores, and periods, and cannot have spaces.',
        ]);

        // Tambahkan debug untuk melihat data yang dikirim
        // dd($request->all());

        $user = User::create([
            'username' => strtolower($request->username),
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,  // Role diambil dari request
        ]);

        event(new Registered($user));

        return redirect()->route('admin.tourist.index')->with('success', 'Created successfully.');
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
            'role' => 'nullable|string',
        ]);

        $user = User::find($id);  // Pastikan nama model dimulai dengan huruf kapital
        if ($user) {
            $user->update($request->all());
            return redirect()->route('admin.tourist.index')->with('success', 'Updated successfully.');
        } else {
            return redirect()->route('admin.tourist.index')->with('error', 'User not found.');
        }
    }


    public function destroy($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $user->delete();

        return redirect()->route('admin.tourist.index')->with('success', 'Deleted successfully.');
    }
}