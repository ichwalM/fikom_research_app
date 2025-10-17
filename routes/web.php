<?php

use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\SkemaPenelitianController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\public\BlogsController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Users\PenelitianController;
use App\Http\Controllers\Users\PublikasiController;

// Rute untuk halaman publik
Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/dosen/{user}', [PublicController::class, 'show'])->name('dosen.show');

// Rute dasbor default dari Breeze
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Rute untuk dasbor khusus
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

// Rute untuk mengelola profil pengguna (bawaan Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// Profil Dosen
    Route::patch('/profile/dosen', [ProfileController::class, 'updateDosenProfile'])->name('profile.update.dosen');
// publikasi routes
    Route::resource('publikasi', PublikasiController::class);
    // penelitian routes
    Route::resource('penelitian', PenelitianController::class);
// untuk statistic google scholar dan sinta di update dari command
    Route::patch('/profile/statistic', [ProfileController::class, 'updateStatistic'])->name('profile.update.statistic');
});

// Grup untuk semua halaman Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Rute untuk manajemen pengguna (CRUD & Soft Delete)
    Route::get('users/trash', [UserController::class, 'trash'])->name('users.trash');
    Route::put('users/{user}/restore', [UserController::class, 'restore'])->name('users.restore')->withTrashed();
    Route::delete('users/{user}/force-delete', [UserController::class, 'forceDelete'])->name('users.forceDelete')->withTrashed();
    Route::resource('users', UserController::class);
    // Rute untuk manajemen skema penelitian
    Route::resource('skema-penelitian', SkemaPenelitianController::class);
    // Rute Laporan Penelitian
    Route::get('laporan/penelitian', [LaporanController::class, 'penelitian'])->name('laporan.penelitian');
    // Rute Laporan Publikasi
    Route::get('laporan/publikasi', [LaporanController::class, 'publikasi'])->name('laporan.publikasi');
    // Rute export excel
    Route::get('laporan/penelitian/export', [LaporanController::class, 'exportPenelitian'])->name('laporan.penelitian.export');
}); 

// File rute autentikasi bawaan Breeze
require __DIR__.'/auth.php';