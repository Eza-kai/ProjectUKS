<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BackendController; 
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\JadwalPemeriksaanController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RiwayatKunjunganController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Petugas;
use App\Http\Middleware\Siswa;


// Landing Page + Login
Route::get('/', fn() => view('index'));
Auth::routes(['register' => false]);
Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::middleware(['auth', Admin::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', fn() => view('dashboard.admin'))->name('dashboard');
    Route::resource('user', UserController::class)->middleware(['auth', Admin::class]);
    Route::resource('rekam_medis', RekamMedisController::class);
    Route::resource('obat', ObatController::class);
    Route::resource('jadwal_pemeriksaan', JadwalPemeriksaanController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('petugas', PetugasController::class);
    Route::resource('riwayat_kunjungan', RiwayatKunjunganController::class);
    Route::get('siswa/export/pdf', [SiswaController::class, 'exportPdf'])->name('siswa.exportPdf');
    Route::get('siswa/laporan/gabungan', [SiswaController::class, 'exportLaporanGabungan'])->name('laporan_gabungan.pdf');

});


Route::middleware(['auth', Petugas::class])->prefix('petugas')->name('petugas.')->group(function () {
    Route::get('/', fn() => view('dashboard.petugas'))->name('dashboard');
    Route::resource('kelas', KelasController::class);    
    Route::resource('siswa', SiswaController::class);
    Route::resource('jadwal_pemeriksaan', JadwalPemeriksaanController::class);
    Route::resource('rekam', RekamMedisController::class);
    Route::resource('obat', ObatController::class);
});

Route::middleware(['auth', Siswa::class])->group(function () {
    Route::get('/siswa', fn() => view('dashboard.siswa'))->name('siswa.dashboard');
});
