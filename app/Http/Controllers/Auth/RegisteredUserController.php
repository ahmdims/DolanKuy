<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        do {
            $username = 'pengguna' . str_pad(random_int(0, 999999999999), 12, '0', STR_PAD_LEFT);
        } while (User::where('username', $username)->exists());

        $request->merge(['username' => $username]);

        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['min:8', 'required', 'confirmed', 'string', Rules\Password::defaults()],
        ], [
            'name.required' => 'Nama wajib diisi, cuy!',
            'name.string' => 'Nama harus berupa string.',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'email.required' => 'Emailnya jangan lupa diisi dong!',
            'email.email' => 'Hmm, format emailnya ga valid nih. Cek lagi!',
            'email.lowercase' => 'Email harus menggunakan huruf kecil.',
            'email.unique' => 'Waduh, email ini udah terdaftar. Cari email lain deh!',
            'password.min' => 'Password minimal 8 karakter biar aman, oke!',
            'password.required' => 'Password-nya kudu diisi, sob!',
            'password.confirmed' => 'Konfirmasi password-nya ga cocok nih, hati-hati ya!',
        ]);

        $user = User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect('/');
    }
}
