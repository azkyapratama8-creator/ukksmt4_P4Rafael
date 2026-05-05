<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

// ================= LOGIN =================
Route::get('/', fn() => view('auth.login'));
Route::get('/login', fn() => view('auth.login'));
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);


// ================= ADMIN =================
Route::prefix('admin')->middleware('role:admin')->group(function () {
    Route::get('/dashboard', fn() => view('admin.dashboard'));

    /*
    |--------------------------------------------------------------------------
    | PETUGAS CRUD
    |--------------------------------------------------------------------------
    */
    Route::get('/petugas', [UserController::class, 'petugas']);
    Route::get('/petugas/create', [UserController::class, 'createPetugas']);
    Route::post('/petugas', [UserController::class, 'storePetugas']);

    Route::get('/petugas/{id}/edit', [UserController::class, 'editPetugas']);
    Route::put('/petugas/{id}', [UserController::class, 'updatePetugas']);
    Route::delete('/petugas/{id}', [UserController::class, 'destroyPetugas']);

    /*
    |--------------------------------------------------------------------------
    | ANGGOTA CRUD
    |--------------------------------------------------------------------------
    */
    Route::get('/anggota', [UserController::class, 'anggota']);
    Route::get('/anggota/create', [UserController::class, 'createAnggota']);
    Route::post('/anggota', [UserController::class, 'storeAnggota']);

    Route::get('/anggota/{id}/edit', [UserController::class, 'editAnggota']);
    Route::put('/anggota/{id}', [UserController::class, 'updateAnggota']);
    Route::delete('/anggota/{id}', [UserController::class, 'destroyAnggota']);
});




// ================= DASHBOARD ROLE =================
Route::get('/petugas/dashboard', function () {
    return view('petugas.dashboard');
})->middleware('role:petugas');

Route::get('/dashboard/anggota', function () {
    return view('anggota.dashboard');
})->middleware('role:anggota');

// DASHBOARD PETUGAS
Route::get('/dashboard/petugas', function () {
    return view('petugas.dashboard');
})->middleware('role:petugas');

// DASHBOARD ANGGOTA
Route::get('/dashboard/anggota', function () {
    return view('anggota.dashboard');
})->middleware('role:anggota');
