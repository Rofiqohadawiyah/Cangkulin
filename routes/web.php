<?php

use Illuminate\Support\Facades\Route;
use App\Models\AlatPertanian;
use App\Models\Peminjaman;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KelompokTaniController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController; // ← baru
use App\Http\Controllers\AlatPertanianController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\LaporanController;

// HALAMAN UTAMA (PUBLIC)
Route::get('/', [HomeController::class, 'index'])->name('home');

// LOGIN
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// REGISTER
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// DASHBOARD (ADMIN)
Route::get('/dashboard', function () {
    $alat = AlatPertanian::all();

    $jumlahSedangDipinjam = Peminjaman::whereHas('status', function ($q) {
        $q->where('deskripsi', 'dipinjam');
    })->count();

    $jumlahPerluPengingat = Peminjaman::whereHas('status', function ($q) {
        $q->where('deskripsi', 'perlu pengingat');
    })->count();

    $jumlahDikembalikan = Peminjaman::whereHas('status', function ($q) {
        $q->where('deskripsi', 'dikembalikan');
    })->count();

    return view('dashboard', compact(
        'alat',
        'jumlahSedangDipinjam',
        'jumlahPerluPengingat',
        'jumlahDikembalikan'
    ));
})->middleware('authSession')->name('dashboard');

//Riwayat
Route::get('/riwayat', [App\Http\Controllers\RiwayatController::class, 'index'])
    ->name('riwayat.index');

// ADMIN
Route::middleware('authSession')->group(function () {
   Route::get('/admin', [AdminController::class, 'index'])->name('admin');
   Route::get('/alat', [AlatPertanianController::class, 'index'])->name('alat.index');
    Route::get('/alat/create', [AlatPertanianController::class, 'create'])->name('alat.create');
    Route::post('/alat', [AlatPertanianController::class, 'store'])->name('alat.store');
    Route::get('/alat/{id}/edit', [AlatPertanianController::class, 'edit'])->name('alat.edit');
    Route::match(['post', 'put'], '/alat/{id}/edit', [AlatPertanianController::class, 'update'])
    ->name('alat.update');
    Route::get('/alat/{id}/delete', [AlatPertanianController::class, 'destroy'])->name('alat.delete');
});

// KELOMPOK TANI CRUD
Route::middleware('authSession')->group(function () {

    Route::get('/kelompok_tani', [KelompokTaniController::class, 'index'])->name('kelompok.index');

    Route::get('/kelompok_tani/create', [KelompokTaniController::class, 'create'])->name('kelompok.create');
    Route::post('/kelompok_tani/create', [KelompokTaniController::class, 'store'])->name('kelompok.store');

    Route::get('/kelompok_tani/edit/{id}', [KelompokTaniController::class, 'edit'])->name('kelompok.edit');
    Route::match(['post', 'put'], '/kelompok_tani/edit/{id}', [KelompokTaniController::class, 'update'])
    ->name('kelompok.update');

    Route::get('/kelompok_tani/delete/{id}', [KelompokTaniController::class, 'delete'])->name('kelompok.delete');
});

//Peminjaman
Route::middleware('authSession')->group(function () {

Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
Route::get('/peminjaman/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
Route::post('/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');

});

//pengembalian
Route::middleware(['authSession'])->group(function () {
  Route::get('/pengembalian', [PengembalianController::class, 'index'])->name('pengembalian.index');
  Route::post('/pengembalian/kembalikan', [PengembalianController::class, 'kembalikan'])->name('pengembalian.kembalikan');
Route::put('/pengembalian/{id}/update-status', [PengembalianController::class, 'updateStatus'])
    ->name('pengembalian.updateStatus');

  Route::put('/pengembalian/{id}/perlu-pengingat', [PengembalianController::class, 'perluPengingat'])
        ->name('pengembalian.perluPengingat');
});

// Laporan
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');

// LOGOUT
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');