<?php

use App\Http\Controllers\DestinationAdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\TouristController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CultureController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MsmeAdminController;
use App\Http\Controllers\MsmeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

// Pengguna
Route::get('/', [DashboardController::class, 'index'])->name('app.dashboard.index');

// Destinasi Pengguna
Route::get('/destination', [DestinationController::class, 'index'])->name('app.destination.index');
Route::get('/destination/{slug}', [DestinationController::class, 'show'])->name('app.destination.detail');
Route::post('/destination/{slug}/like', [DestinationController::class, 'like'])->name('destination.like');
Route::post('/destination/{slug}/history', [DestinationController::class, 'history'])->name('destination.history');

// Komentar Destinasi
Route::post('/destination/{slug}/comments', [DestinationController::class, 'storeComment'])->name('destination.comments.store');

// UMKM Pengguna
Route::get('/msme', [MsmeController::class, 'index'])->name('admin.msme.index');
Route::get('/msme/{slug}', [MsmeController::class, 'show'])->name('app.msme.detail');
Route::middleware('auth')->post('/msme/{slug}/like', [MsmeController::class, 'like'])->name('msme.like');
Route::middleware('auth')->post('/msme/{slug}/history', [MsmeController::class, 'history'])->name('msme.history');

// Komentar UMKM
Route::post('/msme/{slug}/comments', [MsmeController::class, 'storeComment'])->name('msme.comments.store');

// Budaya Pengguna
Route::get('/culture', [CultureController::class, 'index'])->name('admin.culture.index');
Route::get('/culture/{slug}', [CultureController::class, 'show'])->name('app.culture.detail');
Route::middleware('auth')->post('/culture/{slug}/like', [CultureController::class, 'like'])->name('culture.like');
Route::middleware('auth')->post('/culture/{slug}/history', [CultureController::class, 'history'])->name('culture.history');

// Komentar UMKM
Route::post('/culture/{slug}/comments', [CultureController::class, 'storeComment'])->name('culture.comments.store');

//Kontak
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

//Bantuan
Route::get('/faq', [FaqController::class, 'index'])->name('admin.faq.index');

// Profil
Route::middleware('auth')->group(function () {
    Route::get('/profile/{username}', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/theme/{id}', [ProfileController::class, 'theme'])->name('profile.theme');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin
Route::middleware(['auth', 'auth.admin'])->group(function () {

    // Dashboard Admin
    Route::get('/admin/dashboard', [AdminController::class, 'admin'])->name('admin.dashboard.index');

    // Kelola Kategori
    Route::get('/admin/category', [CategoryController::class, 'admin'])->name('admin.category.index');
    Route::post('/admin/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/admin/category/{id}', [CategoryController::class, 'show'])->name('category.detail');
    Route::put('/admin/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/admin/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    // Kelola Destinasi
    Route::get('/admin/destination', [DestinationController::class, 'admin'])->name('admin.destination.index');
    Route::post('/admin/destination', [DestinationController::class, 'store'])->name('destination.store');
    Route::get('/admin/destination/{slug}', [DestinationController::class, 'show'])->name('destination.detail');
    Route::get('/admin/destination/{id}/get', [DestinationController::class, 'edit'])->name('faq.edit');
    Route::put('/admin/destination/{slug}', [DestinationController::class, 'update'])->name('destination.update');
    Route::delete('/admin/destination/{slug}', [DestinationController::class, 'destroy'])->name('destination.destroy');

    // Kelola Budaya
    Route::get('/admin/culture', [CultureController::class, 'admin'])->name('admin.culture.index');
    Route::post('/admin/culture', [CultureController::class, 'store'])->name('culture.store');
    Route::get('/admin/culture/{slug}', [CultureController::class, 'show'])->name('culture.detail');
    Route::get('/admin/culture/{id}/get', [CultureController::class, 'edit'])->name('faq.edit');
    Route::put('/admin/culture/{slug}', [CultureController::class, 'update'])->name('culture.update');
    Route::delete('/admin/culture/{slug}', [CultureController::class, 'destroy'])->name('culture.destroy');

    // Kelola UMKM
    Route::get('/admin/msme', [MsmeController::class, 'admin'])->name('admin.msme.index');
    Route::post('/admin/msme', [MsmeController::class, 'store'])->name('msme.store');
    Route::get('/admin/msme/{slug}', [MsmeController::class, 'show'])->name('msme.detail');
    Route::get('/admin/msme/{id}/get', [MsmeController::class, 'edit'])->name('msme.edit');
    Route::put('/admin/msme/{slug}', [MsmeController::class, 'update'])->name('msme.update');
    Route::delete('/admin/msme/{slug}', [MsmeController::class, 'destroy'])->name('msme.destroy');

    // Pengunjung
    Route::get('/admin/tourist', [TouristController::class, 'admin'])->name('admin.tourist.index');
    Route::post('/admin/tourist', [TouristController::class, 'store'])->name('tourist.store');
    Route::put('/admin/tourist/{id}', [TouristController::class, 'update'])->name('tourist.update');
    Route::delete('/admin/tourist/{id}', [TouristController::class, 'destroy'])->name('tourist.destroy');

    // Admin Wisata
    Route::get('/admin/destination-admin', [DestinationAdminController::class, 'admin'])->name('admin.destination-admin.index');
    Route::post('/admin/destination-admin', [DestinationAdminController::class, 'store'])->name('destination-admin.store');
    Route::get('/admin/destination-admin/{id}', [DestinationAdminController::class, 'show'])->name('destination-admin.detail');
    Route::put('/admin/destination-admin/{id}', [DestinationAdminController::class, 'update'])->name('destination-admin.update');
    Route::delete('/admin/destination-admin/{id}', [DestinationAdminController::class, 'destroy'])->name('destination-admin.destroy');

    // Admin UMKM
    Route::get('/admin/msme-admin', [MsmeAdminController::class, 'admin'])->name('admin.msme-admin.index');
    Route::post('/admin/msme-admin', [MsmeAdminController::class, 'store'])->name('msme-admin.store');
    Route::get('/admin/msme-admin/{id}', [MsmeAdminController::class, 'show'])->name('msme-admin.detail');
    Route::put('/admin/msme-admin/{id}', [MsmeAdminController::class, 'update'])->name('msme-admin.update');
    Route::delete('/admin/msme-admin/{id}', [MsmeAdminController::class, 'destroy'])->name('msme-admin.destroy');

    // Website
    Route::get('/admin/website', [WebsiteController::class, 'index'])->name('admin.website.index');
    Route::post('/admin/website', [WebsiteController::class, 'update'])->name('website.update');

    // Bantuan
    Route::get('/admin/faq', [FaqController::class, 'admin'])->name('admin.faq.index');
    Route::post('/admin/faq', [FaqController::class, 'store'])->name('faq.store');
    Route::get('/admin/faq/{id}/get', [FaqController::class, 'edit'])->name('faq.edit');
    Route::put('/admin/faq/{id}', [FaqController::class, 'update'])->name('faq.update');
    Route::delete('/admin/faq/{id}', [FaqController::class, 'destroy'])->name('faq.destroy');

});

require __DIR__ . '/auth.php';
