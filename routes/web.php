<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\DestinasiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

//Admin
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin/dashboard/dashboard');
    })->name('dashboard');

    //USER
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::post('/users', [UsersController::class, 'store'])->name('users.store');
    Route::get('/users/{id}', [UsersController::class, 'detail'])->name('users.detail');
    Route::put('/users/{id}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UsersController::class, 'destroy'])->name('users.destroy');

    //DESTINASI
    Route::get('/destinasi', [DestinasiController::class, 'index'])->name('destinasi.index');
    Route::post('/destinasi', [DestinasiController::class, 'store'])->name('destinasi.store');
    Route::put('/destinasi/{id}', [DestinasiController::class, 'detail'])->name('destinasi.detail');
    Route::put('/destinasi/{id}', [DestinasiController::class, 'update'])->name('destinasi.update');
    Route::delete('/destinasi/{id}', [DestinasiController::class, 'destroy'])->name('destinasi.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
