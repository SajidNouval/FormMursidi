<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardBAKAController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardDEKANController;
use App\Http\Controllers\DashboardDSNController;
use App\Http\Controllers\DashboardKPRController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgotPWController;
use App\Http\Controllers\IrsController;
use App\Http\Controllers\HerRegController;
use App\Http\Controllers\MataKuliahController;


Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');

Route::get('/home', function(){
    return redirect('/sakura');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/sakura', [AdminController::class, 'halamandashboardadmin'])->name('admindashboard');
    Route::get('/sakura/mhsdb', [AdminController::class, 'dbmhs'])->middleware('userAkses:mahasiswa')->name('mhsdb');
    Route::get('/sakura/kaprodidb', [AdminController::class, 'dbkaprodi'])->middleware('userAkses:kaprodi')->name('kaprodidb');
    Route::get('/sakura/dekandb', [AdminController::class, 'dbdekan'])->middleware('userAkses:dekan')->name('dekandb');
    Route::get('/sakura/bakmdb', [AdminController::class, 'dbbakm'])->middleware('userAkses:bakademik')->name('bakadb');
    Route::get('/sakura/pakmdb', [AdminController::class, 'dbpakm'])->middleware('userAkses:pakademik');
    Route::get('/sakura/dosendb', [AdminController::class, 'dbdosen'])->middleware('userAkses:dosen')->name('dosendb');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/sakura/mhsdb/mhsakm', [DashboardController::class, 'akademikmhs'])->middleware('userAkses:mahasiswa')->name('akademikmhs');
    Route::get('/sakura/mhsdb/mhsherreg', [DashboardController::class, 'herregmhs'])->middleware('userAkses:mahasiswa')->name('herregmhs');
    Route::get('/sakura/mhsdb/mhsherreg/konsultasi', [HerRegController::class, 'konsultasimhs'])->middleware('userAkses:mahasiswa')->name('konsultasimhs');
    Route::get('/sakura/mhsdb/mhsherreg/compose', [HerRegController::class, 'konsulcompose'])->middleware('userAkses:mahasiswa')->name('konsulcompose');
    Route::get('/sakura/mhsdb/mhsherreg/read', [HerRegController::class, 'konsulread'])->middleware('userAkses:mahasiswa')->name('konsulread');
    Route::get('/sakura/mhsdb/mhsherreg/profil', [DashboardController::class, 'profilmhs'])->middleware('userAkses:mahasiswa')->name('profilmhs');

    Route::get('/sakura/dosendb/dsnakm', [DashboardDSNController::class, 'akademikdsn'])->middleware('userAkses:dosen')->name('akademikdsn');
    Route::get('/sakura/dosendb/konsultasi', [DashboardDSNController::class, 'konsultasidsn'])->middleware('userAkses:dosen')->name('konsultasidsn');
    Route::get('/sakura/dosendb/compose', [DashboardDSNController::class, 'konsulcomposedsn'])->middleware('userAkses:dosen')->name('dsncompose');
    Route::get('/sakura/dosendb/read', [DashboardDSNController::class, 'konsulreaddsn'])->middleware('userAkses:dosen')->name('dsnread');

    Route::get('/sakura/kaprodidb/kprakm', [DashboardKPRController::class, 'akademikkpr'])->middleware('userAkses:kaprodi')->name('akademikkpr');

    Route::get('/sakura/bakmdb/bakaakm', [DashboardBAKAController::class, 'akademikbaka'])->middleware('userAkses:bakademik')->name(('akademikbaka'));

    Route::get('/sakura/dekandb/dekanakm', [DashboardDEKANController::class, 'akademikdekan'])->middleware('userAkses:dekan')->name('akademikdekan');
});

Route::get('/register', [RegisterController::class, 'halamanregister'])->name('register');
Route::post('/simpanregister', [LoginController::class, 'simpanregister'])->name('simpanregister');
Route::get('/forgotpw', [ForgotPWController::class, 'halamanforgotpw'])->name('forgotpw');

// Menambah mata kuliah ke IRS
Route::post('/irs/tambah', [irsController::class, 'tambah'])->name('irs.tambah');
Route::post('/irs/hapus', [irsController::class, 'hapus'])->name('irs.hapus');

// routes/web.php
Route::post('/update-status', [HerRegController::class, 'updateStatus'])->name('update.status');

Route::resource('mata_kuliah', DashboardKPRController::class)->only(['index', 'store', 'destroy']);

Route::resource('mata_kuliah', DashboardKPRController::class)->only(['index', 'store', 'destroy']);
Route::resource('mata_kuliah', MataKuliahController::class);
