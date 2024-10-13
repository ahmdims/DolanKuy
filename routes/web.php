<?php

use App\Http\Controllers\Admin\AdminWisataController;
use App\Http\Controllers\Admin\DestinationController;
use App\Http\Controllers\Admin\TouristController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Admin
Route::middleware('auth.admin')->group(function () {

    //DASHBOARD
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard.index');

    //PENGUNJUNG
    Route::get('/tourist', [TouristController::class, 'index'])->name('admin.tourist.index');
    Route::post('/tourist', [TouristController::class, 'store'])->name('tourist.store');
    Route::get('/tourist/{id}', [TouristController::class, 'detail'])->name('tourist.detail');
    Route::put('/tourist/{id}', [TouristController::class, 'update'])->name('tourist.update');
    Route::delete('/tourist/{id}', [TouristController::class, 'destroy'])->name('tourist.destroy');

    //ADMIN WISATA
    Route::get('/adminwisata', [AdminWisataController::class, 'index'])->name('admin.adminwisata.index');
    Route::post('/adminwisata', [AdminWisataController::class, 'store'])->name('adminwisata.store');
    Route::get('/adminwisata/{id}', [AdminWisataController::class, 'detail'])->name('adminwisata.detail');
    Route::put('/adminwisata/{id}', [AdminWisataController::class, 'update'])->name('adminwisata.update');
    Route::delete('/adminwisata/{id}', [AdminWisataController::class, 'destroy'])->name('adminwisata.destroy');

    //DESTINASI WISATA
    Route::get('/destination', [DestinationController::class, 'index'])->name('admin.destination.index');
    Route::post('/destination', [DestinationController::class, 'store'])->name('destination.store');
    Route::put('/destination/{id}', [DestinationController::class, 'detail'])->name('destination.detail');
    Route::put('/destination/{id}', [DestinationController::class, 'update'])->name('destination.update');
    Route::delete('/destination/{id}', [DestinationController::class, 'destroy'])->name('destination.destroy');
});

require __DIR__ . '/auth.php';
