<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AppController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DestinationController;

Route::get('/', [AppController::class, 'index'])->name('index');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('app.profile.index');
});

//Admin
Route::middleware('auth.admin')->group(function () {

    //DASHBOARD
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard.index');

    //USER
    Route::get('/tourist', [UserController::class, 'index'])->name('admin.tourist.index');
    Route::post('/tourist', [UserController::class, 'store'])->name('users.store');
    Route::get('/tourist/{id}', [UserController::class, 'detail'])->name('users.detail');
    Route::put('/tourist/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/tourist/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    //DESTINASI WISATA
    Route::get('/destination', [DestinationController::class, 'index'])->name('admin.destination.index');
    Route::post('/destination', [DestinationController::class, 'store'])->name('destination.store');
    Route::put('/destination/{id}', [DestinationController::class, 'detail'])->name('destination.detail');
    Route::put('/destination/{id}', [DestinationController::class, 'update'])->name('destination.update');
    Route::delete('/destination/{id}', [DestinationController::class, 'destroy'])->name('destination.destroy');
});