<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(Request $request, $username): View
    {
        $user = User::where('username', $username)->firstOrFail();

        return view('profile.index', [
            'user' => $user,
        ]);
    }

    public function edit(Request $request, $username): View
    {
        $user = User::where('username', $username)->firstOrFail();

        return view('profile.edit', [
            'user' => $user,
        ]);
    }

    public function theme()
    {
        return view('profile.theme');
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        if ($user->id !== $request->input('user_id')) {
            return Redirect::route('profile.edit', [$user->username])->withErrors(['Unauthorized' => 'Anda tidak memiliki izin untuk memperbarui profil ini.']);
        }

        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit', [$user->username])->with('status', 'profile-updated');
    }

    /**
     * Authorize the user.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Define validation rules for profile update.
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $this->user()->id,
            'phone_number' => 'nullable|string|max:15',
            'birth_date' => 'nullable|date',
            'gender' => 'required|in:male,female,other',
            'bio' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama harus diisi.',
            'name.string' => 'Nama harus berupa teks.',
            'name.max' => 'Nama tidak boleh lebih dari :max karakter.',

            'username.required' => 'Username harus diisi.',
            'username.string' => 'Username harus berupa teks.',
            'username.max' => 'Username tidak boleh lebih dari :max karakter.',
            'username.unique' => 'Username sudah digunakan, silakan pilih username lain.',

            'phone_number.string' => 'Nomor telepon harus berupa teks.',
            'phone_number.max' => 'Nomor telepon tidak boleh lebih dari :max karakter.',

            'birth_date.date' => 'Tanggal lahir tidak valid.',

            'gender.required' => 'Jenis kelamin harus dipilih.',
            'gender.in' => 'Jenis kelamin tidak valid.',

            'bio.string' => 'Biografi harus berupa teks.',
        ];
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}