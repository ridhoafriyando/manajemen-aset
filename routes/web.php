<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Halaman awal langsung diarahkan ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// Route yang wajib diakses setelah login
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Redirect /dashboard langsung ke daftar aset
    Route::get('/dashboard', function () {
        return redirect()->route('assets.index');
    })->name('dashboard');

    // Route Resource CRUD Aset (Otomatis mencakup index, create, store, edit, update, destroy)
    Route::resource('assets', AssetController::class);

    // Route Profile Bawaan Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';