<?php

use App\Http\Controllers\AdminWisataController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\DestinationController;
use App\Http\Controllers\TouristController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MsmeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Pengguna
Route::get('/', fn() => view('app.dashboard.index'))->name('dashboard');

Route::get('/msme', [MsmeController::class, 'index'])->name('admin.msme.index');
Route::get('/msme/{slug}', [MsmeController::class, 'show'])->name('msme.detail');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/faq', [FaqController::class, 'index'])->name('admin.faq.index');

// Profil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin
Route::middleware('auth.admin')->group(function () {

    // Dashboard Admin
    Route::group(['middleware' => 'auth.admin'], function () {
        Route::get('/admin/dashboard', [AdminController::class, 'admin'])->name('admin.dashboard.index');
    });

    // Pengunjung
    Route::group(['middleware' => 'auth.admin'], function () {
        Route::get('/admin/tourist', [TouristController::class, 'admin'])->name('admin.tourist.index');
        Route::post('/admin/tourist', [TouristController::class, 'store'])->name('tourist.store');
        Route::get('/admin/tourist/{id}', [TouristController::class, 'show'])->name('tourist.detail');
        Route::put('/admin/tourist/{id}', [TouristController::class, 'update'])->name('tourist.update');
        Route::delete('/admin/tourist/{id}', [TouristController::class, 'destroy'])->name('tourist.destroy');
    });

    // Admin Wisata
    Route::group(['middleware' => 'auth.admin'], function () {
        Route::get('/admin/adminwisata', [AdminWisataController::class, 'admin'])->name('admin.adminwisata.index');
        Route::post('/admin/adminwisata', [AdminWisataController::class, 'store'])->name('adminwisata.store');
        Route::get('/admin/adminwisata/{id}', [AdminWisataController::class, 'show'])->name('adminwisata.detail');
        Route::put('/admin/adminwisata/{id}', [AdminWisataController::class, 'update'])->name('adminwisata.update');
        Route::delete('/admin/adminwisata/{id}', [AdminWisataController::class, 'destroy'])->name('adminwisata.destroy');
    });

    // Kategori
    Route::group(['middleware' => 'auth.admin'], function () {
        Route::get('/admin/category', [CategoryController::class, 'admin'])->name('admin.category.index');
        Route::post('/admin/category', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/admin/category/{id}', [CategoryController::class, 'show'])->name('category.detail');
        Route::put('/admin/category/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/admin/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });

    // Destinasi Wisata
    Route::resource('destination', DestinationController::class)->names([
        'index' => 'admin.destination.index',
        'store' => 'destination.store',
        'show' => 'destination.detail',
        'update' => 'destination.update',
        'destroy' => 'destination.destroy',
    ])->parameters(['destination' => 'id']);

    //Kontak
    Route::get('/admin/contact', [ContactController::class, 'admin'])->middleware('auth.admin');

    // Bantuan
    Route::group(['middleware' => 'auth.admin'], function () {
        Route::get('/admin/faq', [FaqController::class, 'admin'])->name('admin.faq.index');
        Route::post('/admin/faq', [FaqController::class, 'store'])->name('faq.store');
        Route::get('/admin/faq/{id}', [FaqController::class, 'show'])->name('faq.detail');
        Route::put('/admin/faq/{id}', [FaqController::class, 'update'])->name('faq.update');
        Route::delete('/admin/faq/{id}', [FaqController::class, 'destroy'])->name('faq.destroy');
    });
});

require __DIR__ . '/auth.php';