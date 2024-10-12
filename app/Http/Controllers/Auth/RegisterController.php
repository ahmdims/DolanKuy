<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        $messages = [
            'username.required' => 'Nama Pengguna wajib diisi, bro!',
            'username.unique' => 'Aduh, username ini udah dipakai yang lain.',
            'username.regex' => 'Nama Pengguna cuma boleh a-z, 0-9, _ , . (no spasi ya!)',
            'name.required' => 'Nama wajib diisi, bro!',
            'email.required' => 'Emailnya jangan lupa diisi dong!',
            'email.email' => 'Hmm, format emailnya ga valid nih. Cek lagi!',
            'email.unique' => 'Waduh, email ini udah terdaftar. Cari email lain deh!',
            'password.required' => 'Password-nya kudu diisi, sob!',
            'password.min' => 'Password minimal 8 karakter biar aman, oke!',
            'password.confirmed' => 'Konfirmasi password-nya ga cocok nih, hati-hati ya!',
        ];

        return Validator::make($data, [
            'username' => [
                'required', 
                'string', 
                'unique:users,username', 
                'max:255', 
                'regex:/^[a-z0-9_.]+$/'
            ],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], $messages);
    }

    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}