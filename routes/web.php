<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\public\BlogsController;

// Rute untuk halaman publik
Route::get('/', [BlogsController::class, 'index'])->name('home');

// Rute dasbor default dari Breeze
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rute untuk mengelola profil pengguna (bawaan Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Grup untuk semua halaman Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Rute untuk manajemen pengguna (CRUD & Soft Delete)
    Route::get('users/trash', [UserController::class, 'trash'])->name('users.trash');
    Route::put('users/{user}/restore', [UserController::class, 'restore'])->name('users.restore')->withTrashed();
    Route::delete('users/{user}/force-delete', [UserController::class, 'forceDelete'])->name('users.forceDelete')->withTrashed();
    Route::resource('users', UserController::class);

}); 

// File rute autentikasi bawaan Breeze
require __DIR__.'/auth.php';