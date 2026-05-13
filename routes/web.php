<?php

use Illuminate\Support\Facades\Route;

// ================= CONTROLLER =================
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PengarangController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\RakBukuController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\DendaController;
use App\Http\Controllers\LaporanPeminjamanController;
use App\Http\Controllers\LaporanPengembalianController;
use App\Http\Controllers\LaporanDendaController;

# =================================================
# 🔐 AUTH
# =================================================
Route::get('/', fn() => view('auth.login'));
Route::get('/login', fn() => view('auth.login'));

Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

# =================================================
# 👨‍💻 ADMIN (MASTER DATA + LAPORAN)
# =================================================
Route::prefix('admin')->middleware('role:admin')->group(function () {

    # DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index']);

    # USER MANAGEMENT
    Route::resource('users', UserController::class);

    # MASTER DATA BUKU
    Route::resource('buku', BukuController::class);
    Route::resource('pengarang', PengarangController::class);
    Route::resource('penerbit', PenerbitController::class);
    Route::resource('rak-buku', RakBukuController::class);
    Route::resource('kelas', KelasController::class);

    # LAPORAN (READ ONLY)
    Route::get('/laporan-peminjaman', [LaporanPeminjamanController::class, 'index']);
    Route::get('/laporan-pengembalian', [LaporanPengembalianController::class, 'index']);
    Route::get('/laporan-denda', [LaporanDendaController::class, 'index']);
});

# =================================================
# 👨‍💼 PETUGAS (APPROVAL + OPERASIONAL)
# =================================================
Route::prefix('petugas')->middleware('role:petugas')->group(function () {

    # DASHBOARD
    Route::get('/dashboard', fn() => view('petugas.dashboard'));

    # ================= PEMINJAMAN =================
    Route::resource('peminjaman', PeminjamanController::class)
        ->names('petugas.peminjaman');
    Route::get('peminjaman/{id}/approve', [PeminjamanController::class, 'approve'])
        ->name('petugas.peminjaman.approve');
    Route::get('peminjaman/{id}/reject', [PeminjamanController::class, 'reject'])
        ->name('petugas.peminjaman.reject');

    # ================= PENGEMBALIAN =================
    Route::resource('pengembalian', PengembalianController::class)
        ->names('petugas.pengembalian');
    route::get('pengembalian/create', [PengembalianController::class, 'create'])
        ->name('petugas.pengembalian.create');
    route::post('pengembalian', [PengembalianController::class, 'store'])
        ->name('petugas.pengembalian.store');

    # ================= DENDA =================
    // 📊 denda
    Route::get('denda', [DendaController::class, 'index']);
    Route::post('denda', [DendaController::class, 'store']);
    // ✔ bayar denda
    Route::get('denda/{id}/bayar', [DendaController::class, 'bayar']);
});

# =================================================
# 👤 ANGGOTA (USER PINJAM BUKU)
# =================================================
Route::prefix('anggota')->middleware('role:anggota')->group(function () {

    # DASHBOARD
    Route::get('/dashboard', fn() => view('anggota.dashboard'))
        ->name('anggota.dashboard');

    # PINJAM BUKU
    Route::get('/peminjaman/create', [PeminjamanController::class, 'create'])
        ->name('anggota.peminjaman.create');

    Route::post('/peminjaman', [PeminjamanController::class, 'store'])
        ->name('anggota.peminjaman.store');
});
