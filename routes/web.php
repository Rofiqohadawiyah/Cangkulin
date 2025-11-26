<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KelompokTaniController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController; // ← baru

// HALAMAN UTAMA (PUBLIC) - tanpa middleware
Route::get('/', [HomeController::class, 'index'])->name('home');

// LOGIN
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// REGISTER
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// DASHBOARD (ADMIN)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('authSession')->name('dashboard');

// ADMIN
Route::middleware('authSession')->group(function () {
   Route::get('/admin', [AdminController::class, 'index'])->name('admin');
});

// KELOMPOK TANI CRUD
Route::middleware('authSession')->group(function () {

    Route::get('/kelompok_tani', [KelompokTaniController::class, 'index'])->name('kelompok.index');

    Route::get('/kelompok_tani/create', [KelompokTaniController::class, 'create'])->name('kelompok.create');
    Route::post('/kelompok_tani/create', [KelompokTaniController::class, 'store'])->name('kelompok.store');

    Route::get('/kelompok_tani/edit/{id}', [KelompokTaniController::class, 'edit'])->name('kelompok.edit');
    Route::post('/kelompok_tani/edit/{id}', [KelompokTaniController::class, 'update'])->name('kelompok.update');

    Route::get('/kelompok_tani/delete/{id}', [KelompokTaniController::class, 'delete'])->name('kelompok.delete');
});

// LOGOUT
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
