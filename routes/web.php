<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PengarangController;
use App\Http\Controllers\PenerbitController;

// ================= LOGIN =================
Route::get('/', fn() => view('auth.login'));
Route::get('/login', fn() => view('auth.login'));
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);


// ================= ADMIN =================
Route::prefix('admin')->middleware('role:admin')->group(function () {
    Route::get('/dashboard', fn() => view('admin.dashboard'));

    // ================= CRUD USERS =================
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/create', [UserController::class, 'create']);
    Route::post('/users', [UserController::class, 'store']);
    Route::get('/users/{id}/edit', [UserController::class, 'edit']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);

    // ================= CRUD BUKU =================
    Route::get('/buku', [BukuController::class, 'index']);
    Route::get('/buku/create', [BukuController::class, 'create']);
    Route::post('/buku', [BukuController::class, 'store']);
    Route::get('/buku/{id}/edit', [BukuController::class, 'edit']);
    Route::put('/buku/{id}', [BukuController::class, 'update']);
    Route::delete('/buku/{id}', [BukuController::class, 'destroy']);

    // ================= CRUD PENGARANG =================
    Route::get('/pengarang', [PengarangController::class, 'index']);
    Route::get('/pengarang/create', [PengarangController::class, 'create']);
    Route::post('/pengarang', [PengarangController::class, 'store']);
    Route::get('/pengarang/{id}/edit', [PengarangController::class, 'edit']);
    Route::put('/pengarang/{id}', [PengarangController::class, 'update']);
    Route::delete('/pengarang/{id}', [PengarangController::class, 'destroy']);

    // ================= CRUD PENERBIT =================
    Route::get('/penerbit', [PenerbitController::class, 'index']);
    Route::get('/penerbit/create', [PenerbitController::class, 'create']);
    Route::post('/penerbit', [PenerbitController::class, 'store']);
    Route::get('/penerbit/{id}/edit', [PenerbitController::class, 'edit']);
    Route::put('/penerbit/{id}', [PenerbitController::class, 'update']);
    Route::delete('/penerbit/{id}', [PenerbitController::class, 'destroy']);
});


// ================= DASHBOARD ROLE =================
// DASHBOARD PETUGAS
Route::get('/dashboard/petugas', function () {
    return view('petugas.dashboard');
})->middleware('role:petugas');

// DASHBOARD ANGGOTA
Route::get('/dashboard/anggota', function () {
    return view('anggota.dashboard');
})->middleware('role:anggota');
