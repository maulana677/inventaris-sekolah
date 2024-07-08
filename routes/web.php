<?php

use App\Http\Controllers\Admin\BarangController;
use App\Http\Controllers\Admin\BarangKeluarController;
use App\Http\Controllers\Admin\BarangMasukController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\LaporanBulananController;
use App\Http\Controllers\Admin\LokasiController;
use App\Http\Controllers\Admin\PeminjamanController;
use App\Http\Controllers\Admin\RiwayatStokController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route untuk login dan logout
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Middleware untuk admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('kategori', KategoriController::class);

    Route::resource('lokasi', LokasiController::class);

    // Supplier
    Route::resource('supplier', SupplierController::class);

    // Barang
    Route::resource('barang', BarangController::class);
    // Rute untuk generate kode barang otomatis
    Route::get('barangs/generate-kode-barang', [BarangController::class, 'generateKodeBarang'])->name('barangs.generate-kode-barang');

    // Barang Masuk
    Route::resource('barang-masuk', BarangMasukController::class);

    // Barang Keluar
    Route::resource('barang-keluar', BarangKeluarController::class);

    // Peminjaman
    Route::resource('peminjaman', PeminjamanController::class);

    // Riwayat Stok
    Route::resource('riwayat-stok', RiwayatStokController::class);

    // Laporan Bulanan
    Route::resource('laporan-bulanan', LaporanBulananController::class);
    Route::get('laporan-bulanan/view/pdf', [LaporanBulananController::class, 'cetakPdf'])->name('laporan-bulanan.pdf');
});


// Route untuk semua pengguna (admin dan user)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard.index');
    })->name('dashboard');

    Route::resource('barang', BarangController::class);
    // Rute untuk generate kode barang otomatis
    Route::get('barangs/generate-kode-barang', [BarangController::class, 'generateKodeBarang'])->name('barangs.generate-kode-barang');
});
