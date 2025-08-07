<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RumahSakitController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DashboardController;

// Rute ini buat halaman utama. Kalau udah login, dia langsung ke dashboard.
// Kalau belum, diarahkan ke halaman login.
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

// Ini rute buat urusan login dan register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute-rute di bawah ini cuma bisa diakses kalau user udah login (ada middleware 'auth')
Route::middleware(['auth'])->group(function () {
    // Rute buat halaman dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Rute CRUD untuk Rumah Sakit (tambah, lihat, edit, hapus)
    Route::resource('rumahsakit', RumahSakitController::class);

    // Rute CRUD untuk Pasien
    // Route::resource ini udah bikin rute-rute standar, tapi kita cuma pakai beberapa aja.
    // Kita juga tambahin rute khusus buat filter data pasien.
    Route::resource('pasien', PasienController::class)->except(['create', 'edit']);
    Route::get('/pasien-filter', [PasienController::class, 'filter']);
});
