<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgotPWController;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');

Route::get('/home', function(){
    return redirect('/sakura');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/sakura', [AdminController::class, 'halamandashboardadmin'])->name('admindashboard');
    Route::get('/sakura/mhsdb', [AdminController::class, 'dbmhs'])->middleware('userAkses:mahasiswa')->name('mhsdb');
    Route::get('/sakura/kaprodidb', [AdminController::class, 'dbkaprodi'])->middleware('userAkses:kaprodi');
    Route::get('/sakura/dekandb', [AdminController::class, 'dbdekan'])->middleware('userAkses:dekan');
    Route::get('/sakura/bakmdb', [AdminController::class, 'dbbakm'])->middleware('userAkses:bakademik');
    Route::get('/sakura/pakmdb', [AdminController::class, 'dbpakm'])->middleware('userAkses:pakademik');
    Route::get('/sakura/dosendb', [AdminController::class, 'dbdosen'])->middleware('userAkses:dosen')->name('dosendb');
    
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/sakura/mhsdb/mhsakm', [DashboardController::class, 'akademikmhs'])->middleware('userAkses:mahasiswa')->name('akademikmhs');
    Route::get('/sakura/mhsdb/mhsherreg', [DashboardController::class, 'herregmhs'])->middleware('userAkses:mahasiswa')->name('herregmhs');
});

Route::get('/register', [RegisterController::class, 'halamanregister'])->name('register');
Route::post('/simpanregister', [LoginController::class, 'simpanregister'])->name('simpanregister');
Route::get('/forgotpw', [ForgotPWController::class, 'halamanforgotpw'])->name('forgotpw');
