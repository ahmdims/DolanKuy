<?php

use App\Http\Controllers\DestinationAdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\TouristController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MsmeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

// Pengguna
Route::get('/', fn() => view('app.dashboard.index'))->name('dashboard');

// Destinasi Pengguna
Route::get('/destination', [DestinationController::class, 'index'])->name('app.destination.index');
Route::get('/destination/{slug}', [DestinationController::class, 'show'])->name('app.destination.detail'); // Ganti menjadi 'app.destination.detail'
Route::post('/destination/{slug}/like', [DestinationController::class, 'like'])->name('destination.like');
Route::post('/destination/{slug}/history', [DestinationController::class, 'history'])->name('destination.history');

// Komentar Destinasi
Route::post('/destination/{slug}/comments', [DestinationController::class, 'storeComment'])->name('destination.comments.store');

// UMKM Pengguna
Route::get('/msme', [MsmeController::class, 'index'])->name('admin.msme.index');
Route::get('/msme/{slug}', [MsmeController::class, 'show'])->name('msme.detail');
Route::middleware('auth')->post('/msme/{slug}/like', [MsmeController::class, 'like'])->name('msme.like');
Route::middleware('auth')->post('/msme/{slug}/history', [MsmeController::class, 'history'])->name('msme.history');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/faq', [FaqController::class, 'index'])->name('admin.faq.index');

Route::get('/search', [SearchController::class, 'index'])->name('search.index');

// Profil
Route::middleware('auth')->group(function () {
    Route::get('/profile/{username}', [ProfileController::class, 'index'])->name('profile.index');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin
Route::middleware('auth.admin')->group(function () {

    // Dashboard Admin
    Route::get('/admin/dashboard', [AdminController::class, 'admin'])->name('admin.dashboard.index');

    // Pengunjung
    Route::get('/admin/tourist', [TouristController::class, 'admin'])->name('admin.tourist.index');
    Route::post('/admin/tourist', [TouristController::class, 'store'])->name('tourist.store');
    Route::put('/admin/tourist/{id}', [TouristController::class, 'update'])->name('tourist.update');
    Route::delete('/admin/tourist/{id}', [TouristController::class, 'destroy'])->name('tourist.destroy');

    // Admin Wisata
    Route::get('/admin/destination-admin', [DestinationAdminController::class, 'admin'])->name('admin.destination.index');
    Route::post('/admin/destination-admin', [DestinationAdminController::class, 'store'])->name('admin.destination.store');
    Route::get('/admin/destination-admin/{id}', [DestinationAdminController::class, 'show'])->name('admin.destination.detail'); // Pastikan rute ini untuk admin
    Route::put('/admin/destination-admin/{id}', [DestinationAdminController::class, 'update'])->name('admin.destination.update');
    Route::delete('/admin/destination-admin/{id}', [DestinationAdminController::class, 'destroy'])->name('admin.destination.destroy');

    // Kategori
    Route::get('/admin/category', [CategoryController::class, 'admin'])->name('admin.category.index');
    Route::post('/admin/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/admin/category/{id}', [CategoryController::class, 'show'])->name('category.detail');
    Route::put('/admin/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/admin/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    // Destinasi Wisata
    Route::group(['middleware' => 'auth.admin'], function () {
        Route::get('/admin/destination', [DestinationController::class, 'admin'])->name('admin.destination.index');
        Route::post('/admin/destination', [DestinationController::class, 'store'])->name('destination.store');
        Route::get('/admin/destination/{slug}', [DestinationController::class, 'show'])->name('destination.detail');
        Route::put('/admin/destination/{slug}', [DestinationController::class, 'update'])->name('destination.update');
        Route::delete('/admin/destination/{slug}', [DestinationController::class, 'destroy'])->name('destination.destroy');
    });

    // Kontak
    Route::get('/admin/contact', [ContactController::class, 'admin'])->name('admin.contact.index');
    Route::post('/admin/contact', [ContactController::class, 'send'])->name('contact.send');
    Route::post('/admin/contact', [ContactController::class, 'update'])->name('contact.update');

    // Bantuan
    Route::get('/admin/faq', [FaqController::class, 'admin'])->name('admin.faq.index');
    Route::post('/admin/faq', [FaqController::class, 'store'])->name('faq.store');
    Route::get('/admin/faq/{id}', [FaqController::class, 'show'])->name('faq.detail');
    Route::put('/admin/faq/{id}', [FaqController::class, 'update'])->name('faq.update');
    Route::delete('/admin/faq/{id}', [FaqController::class, 'destroy'])->name('faq.destroy');
});

require __DIR__ . '/auth.php';