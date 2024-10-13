<?php

use App\Http\Controllers\Admin\AdminWisataController;
use App\Http\Controllers\Admin\DestinationController;
use App\Http\Controllers\Admin\TouristController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Dashboard
Route::get('/', fn() => view('index'))->name('dashboard');

// Profil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin
Route::middleware('auth.admin')->group(function () {

    // Dashboard Admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard.index');

    // Pengunjung
    Route::resource('tourist', TouristController::class)->names([
        'index' => 'admin.tourist.index',
        'store' => 'tourist.store',
        'show' => 'tourist.detail',
        'update' => 'tourist.update',
        'destroy' => 'tourist.destroy',
    ])->parameters(['tourist' => 'id']);

    // Admin Wisata
    Route::resource('adminwisata', AdminWisataController::class)->names([
        'index' => 'admin.adminwisata.index',
        'store' => 'adminwisata.store',
        'show' => 'adminwisata.detail',
        'update' => 'adminwisata.update',
        'destroy' => 'adminwisata.destroy',
    ])->parameters(['adminwisata' => 'id']);

    // Destinasi Wisata
    Route::resource('destination', DestinationController::class)->names([
        'index' => 'admin.destination.index',
        'store' => 'destination.store',
        'show' => 'destination.detail',
        'update' => 'destination.update',
        'destroy' => 'destination.destroy',
    ])->parameters(['destination' => 'id']);
});

require __DIR__ . '/auth.php';