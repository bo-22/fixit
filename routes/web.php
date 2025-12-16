<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AduanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

// Halaman utama = login form
Route::get('/', [AuthController::class, 'showLogin'])->name('login');

// Proses login
Route::post('/login', [AuthController::class, 'processLogin'])->name('login.process');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');

// Proses sign in (daftar akun baru)
Route::post('/register', [AuthController::class, 'signup'])->name('register.process');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| DASHBOARD (JELAJAH)
|--------------------------------------------------------------------------
|
| Setelah login berhasil → redirect ke /dashboard
| Mahasiswa & staf sama-sama masuk ke halaman jelajah
|
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // halaman utama setelah login
    Route::get('/dashboard', [DashboardController::class, 'jelajah'])
        ->name('dashboard');

    // opsional: zona detail (kalau UI butuh popup/page terpisah)
    Route::get('/dashboard/zona/{id}', [DashboardController::class, 'zonaDetail'])
        ->name('dashboard.zona');
});


/*
|--------------------------------------------------------------------------
| MENU ADUAN (LIST)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/aduan', [DashboardController::class, 'aduanList'])
        ->name('aduan.index');
});


/*
|--------------------------------------------------------------------------
| AKSI ADUAN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // mahasiswa → buat aduan
    Route::post('/aduan/store', [AduanController::class, 'store'])
        ->name('aduan.store');

    // staf → proses aduan
    Route::post('/aduan/{id}/proses', [AduanController::class, 'proses'])
        ->name('aduan.proses');

    // staf → selesaikan
    Route::post('/aduan/{id}/selesai', [AduanController::class, 'selesai'])
        ->name('aduan.selesai');

    // mahasiswa → rating
    Route::post('/aduan/{id}/rating', [AduanController::class, 'rating'])
        ->name('aduan.rating');
});
