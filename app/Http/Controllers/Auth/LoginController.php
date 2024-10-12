<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [];

        $user = \App\Models\User::where('email', $request->input('email'))->first();

        if ($user) {
            $errors['password'] = ['Yah, password-nya salah. Cek lagi, ya!'];
        } else {
            $errors['email'] = ['Yah, email ini belum terdaftar.'];
        }

        throw ValidationException::withMessages($errors);
    }

    public function email()
    {
        return 'email';
    }
}