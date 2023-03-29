<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\VerifikasiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('welcome', WelcomeController::class);

// Login
Route::get('/login', function () {
    return view('layouts.login');
})->name('login');

Route::post('/login', [LoginController::class, 'authentication']);
Route::get('/logout', [LoginController::class, 'logout']);

// Register
Route::resource('register', RegisterController::class);

// Dashboard
route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

// Pengaduan
Route::resource('pengaduan', PengaduanController::class);
Route::resource('verifikasi', VerifikasiController::class);

// Tanggapan
Route::resource('tanggapan', TanggapanController::class);

// Masyarakat
Route::resource('masyarakat', MasyarakatController::class);

// Petugas
Route::resource('petugas', PetugasController::class);

// Laporan
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
Route::get('laporan/cetak', [LaporanController::class, 'show'])->name('show');
Route::get('pengaduan/cetak/{id}', [PengaduanController::class, 'pdf'])->name('pengaduan.cetak');