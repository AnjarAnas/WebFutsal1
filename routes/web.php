<?php

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
    Route::get('/logout',[LoginController::class,'logout']);
    Route::get('/bayar/{id}',[BayarController::class,'bayar']);
});

