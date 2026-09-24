<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

// Controller RW
use App\Http\Controllers\Rw\RtController;
use App\Http\Controllers\Rw\KategoriPengaduanController;
use App\Http\Controllers\Rw\KategoriUmkmController;
use App\Http\Controllers\Rw\WargaController;
use App\Http\Controllers\Rw\PengaduanController as RwPengaduanController;
use App\Http\Controllers\Rw\UmkmController as RwUmkmController;
use App\Http\Controllers\Rw\InformasiController as RwInformasiController;
use App\Http\Controllers\Rw\KegiatanController as RwKegiatanController;

// Controller RT
use App\Http\Controllers\Rt\PengaduanController as RtPengaduanController;
use App\Http\Controllers\Rt\UmkmController as RtUmkmController;
use App\Http\Controllers\Rt\InformasiController as RtInformasiController;
use App\Http\Controllers\Rt\KegiatanController as RtKegiatanController;

// Controller Warga
use App\Http\Controllers\Warga\PengaduanController as WargaPengaduanController;
use App\Http\Controllers\Warga\UmkmController as WargaUmkmController;
use App\Http\Controllers\Warga\ProfileController as WargaProfileController;


/*
|--------------------------------------------------------------------------
| LOGIN & LOGOUT
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Root redirect ke login
Route::get('/', fn() => redirect()->route('login'));


/*
|--------------------------------------------------------------------------
| RW (Super Admin)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:rw'])->prefix('rw')->name('rw.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'rw'])->name('dashboard');

    // Master Data
    Route::resource('rt', RtController::class);
    Route::resource('kategori-pengaduan', KategoriPengaduanController::class);
    Route::resource('kategori-umkm', KategoriUmkmController::class);

    // Data Inti
    Route::resource('warga', WargaController::class);
    Route::resource('pengaduan', RwPengaduanController::class);
    Route::resource('umkm', RwUmkmController::class);

    // Informasi & Kegiatan
    Route::resource('informasi', RwInformasiController::class);
    Route::resource('kegiatan', RwKegiatanController::class);
});


/*
|--------------------------------------------------------------------------
| RT (Admin RT)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:rt'])->prefix('rt')->name('rt.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'rt'])->name('dashboard');

    // Pengaduan (hanya index, show, update status)
    Route::get('pengaduan', [RtPengaduanController::class, 'index'])->name('pengaduan.index');
    Route::get('pengaduan/{pengaduan}', [RtPengaduanController::class, 'show'])->name('pengaduan.show');
    Route::put('pengaduan/{pengaduan}/status', [RtPengaduanController::class, 'updateStatus'])->name('pengaduan.updateStatus');

    // UMKM (hanya index & verifikasi)
    Route::get('umkm', [RtUmkmController::class, 'index'])->name('umkm.index');
    Route::put('umkm/{umkm}/status', [RtUmkmController::class, 'updateStatus'])->name('umkm.updateStatus');

    // Informasi & Kegiatan (CRUD penuh)
    Route::resource('informasi', RtInformasiController::class);
    Route::resource('kegiatan', RtKegiatanController::class);
});


/*
|--------------------------------------------------------------------------
| WARGA
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:warga'])->prefix('warga')->name('warga.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'warga'])->name('dashboard');

    // Profil
    Route::get('/profile', [WargaProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [WargaProfileController::class, 'update'])->name('profile.update');

    // Pengaduan & UMKM
    Route::resource('pengaduan', WargaPengaduanController::class);
    Route::resource('umkm', WargaUmkmController::class);
}); 