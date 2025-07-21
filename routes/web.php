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
use App\Http\Controllers\LogAktivitasController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Petugas;
use App\Http\Middleware\Siswa;


// Landing Page + Login
Route::get('/', function () {
    return view('index');
});
Auth::routes(['register' => false]);
Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::middleware(['auth', Admin::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', fn() => view('dashboard.admin'))->name('dashboard');
    Route::resource('user', UserController::class)->middleware(['auth', Admin::class]);
    Route::resource('rekam_medis', RekamMedisController::class);
    Route::get('/get-siswa/{kelas_id}', [SiswaController::class, 'getSiswaByKelas']);
    Route::resource('obat', ObatController::class);
    Route::resource('log_aktivitas', LogAktivitasController::class);
    Route::get('log-aktivitas/export/pdf', [LogAktivitasController::class, 'exportPdf'])->name('log_aktivitas.export');
    Route::get('log-aktivitas', [LogAktivitasController::class, 'index'])->name('log_aktivitas.index');
    Route::resource('jadwal_pemeriksaan', JadwalPemeriksaanController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('siswa', SiswaController::class);
    Route::get('siswa', [SiswaController::class, 'index'])->name('siswa.index');    
    Route::resource('petugas', PetugasController::class);
    Route::resource('riwayat_kunjungan', RiwayatKunjunganController::class);        
    Route::get('tampil', [UserController::class, 'tampil'])->name('user.tampil');
    Route::get('laporan', [RekamMedisController::class, 'laporan'])->name('rekam_medis.laporan');
    Route::get('siswa/export/pdf', [SiswaController::class, 'exportPdf'])->name('siswa.exportPdf');
    Route::get('siswa/laporan/gabungan', [SiswaController::class, 'exportLaporanGabungan'])->name('laporan_gabungan.pdf');
    Route::get('rekam_medis/export/pdf', [RekamMedisController::class, 'exportPdf'])->name('rekam_medis.exportPdf');        
});


Route::middleware(['auth', Petugas::class])->prefix('petugas')->name('petugas.')->group(function () {
    Route::get('/', fn() => view('dashboard.petugas'))->name('dashboard');
    Route::resource('rekam_medis', RekamMedisController::class);
    Route::get('log-aktivitas/export/pdf', [LogAktivitasController::class, 'exportPdf'])->name('log_aktivitas.export');
    Route::get('log-aktivitas', [LogAktivitasController::class, 'index'])->name('log_aktivitas.index');
    Route::resource('jadwal_pemeriksaan', JadwalPemeriksaanController::class);
    Route::resource('riwayat_kunjungan', RiwayatKunjunganController::class);
    Route::get('rekam_medis/laporan', [RekamMedisController::class, 'laporan'])->name('rekam_medis.laporan');
    Route::get('rekam_medis/export/pdf', [RekamMedisController::class, 'exportPdf'])->name('rekam_medis.exportPdf');
    Route::resource('kelas', KelasController::class);    
    Route::resource('siswa', SiswaController::class);
    Route::resource('jadwal_pemeriksaan', JadwalPemeriksaanController::class);
    Route::resource('rekam', RekamMedisController::class);
    Route::resource('obat', ObatController::class);
});

Route::middleware(['auth', Siswa::class])->group(function () {
    Route::get('/siswa', fn() => view('dashboard.siswa'))->name('siswa.dashboard');
    Route::resource('rekam_medis', RekamMedisController::class);    
    Route::resource('jadwal_pemeriksaan', JadwalPemeriksaanController::class);
    Route::resource('riwayat_kunjungan', RiwayatKunjunganController::class);
});
