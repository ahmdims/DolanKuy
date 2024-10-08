<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.users', compact('users'));
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
            'email' => 'required|string|max:255',
            'role' => 'required|string|in:admin,manager,seller',
            'password' => 'required|string|max:255',

        ], [
            'username.required' => 'The username is required.',
            'username.unique' => 'The username has already been taken.',
            'username.regex' => 'The username may only contain letters, numbers, underscores, and periods, and cannot have spaces.',
        ]);

        $user = User::create([
            'username' => strtolower($request->username),
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return redirect()->route('users.index')->with('success', 'Created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => [
                'string',
                'unique:users,username',
                'max:255',
                'regex:/^[a-zA-Z0-9_.]+$/',
            ],
            'name' => 'string|max:255',
            'email' => 'string|max:255',
            'role' => 'string|in:admin,manager,seller',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('users.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Deleted successfully.');
    }
}