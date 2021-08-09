<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BayarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Role;
use Illuminate\Auth\Events\Login;
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
Route::get('/',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'login']);
Route::get('/logout',[LoginController::class,'logout']);
Route::get('/delete/pesan/{id}',[UserController::class,'hapusPesan']);

Route::group(['middleware'=>['auth','role:2']],function(){
    Route::get('/maps', function () {
        return view('Userlayouts.maps');
    });
    Route::get('/delete/pesan/{id}',[UserController::class,'hapusPesan']);
    Route::post('/cari/{id}',[UserController::class,'cari']);
    Route::get('/home',[UserController::class,'index']);
    Route::get('/jadwal/{id}',[UserController::class,'jadwal']);
    Route::post('/actionbook',[UserController::class,'book']);
    Route::get('/book',[UserController::class,'dataBook']);
    Route::get('/lap/{id}',[UserController::class,'lapangan']);
    Route::get('/bayar/{id}',[BayarController::class,'bayar']);
});

Route::group(['middleware'=>['auth','role:1']],function(){
    Route::get('/dashboard/admin',[AdminController::class,'index']);
    
    Route::get('/konfirmasi/{id}',[AdminController::class,'konfirmasi']);
    Route::get('/cari',[AdminController::class,'cari']);
    Route::get('/user',[AdminController::class,'user']);
    Route::get('/pendapatan',[AdminController::class,'dapat']);

});

