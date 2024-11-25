<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgotPWController;

route::get('/', [LoginController::class,'index'])->name('login');
route::post('/postlogin',[LoginController::class,'postlogin'])->name('postlogin');


route::get('/home', function(){
    return redirect('/sakura');
});

route::middleware(['auth'])->group(function(){
    route::get('/sakura',[AdminController::class,'halamandashboardadmin'])->name('admindashboard');
    route::get('/sakura/mhsdb',[AdminController::class,'dbmhs'])->middleware('userAkses:mahasiswa')->name('mhsdb');
    route::get('/sakura/kaprodidb',[AdminController::class,'dbkaprodi'])->middleware('userAkses:kaprodi');
    route::get('/sakura/dekandb',[AdminController::class,'dbdekan'])->middleware('userAkses:dekan');
    route::get('/sakura/bakmdb',[AdminController::class,'dbbakm'])->middleware('userAkses:bakademik');
    route::get('/sakura/pakmdb',[AdminController::class,'dbpakm'])->middleware('userAkses:pakademik');
    route::get('/logout',[LoginController::class,'logout'])->name('logout');

});

route::middleware(['auth'])->group(function(){
    route::get('/sakura/mhsdb/mhsakm',[DashboardController::class,'akademikmhs'])->middleware('userAkses:mahasiswa')->name('akademikmhs');
});
route::get('/register',[RegisterController::class,'halamanregister'])->name('register');
route::post('/simpanregister',[LoginController::class,'simpanregister'])->name('simpanregister');
route::get('/forgotpw',[ForgotPWController::class,'halamanforgotpw'])->name('forgotpw');


