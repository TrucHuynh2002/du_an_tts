<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChucvuController;
use App\Http\Controllers\CongtyController;
use App\Http\Controllers\CongviecController;
use App\Http\Controllers\DotthuctapController;
use App\Http\Controllers\NhomController;
use App\Http\Controllers\TaikhoanController;
use App\Http\Controllers\ThamgianhomController;
use App\Http\Controllers\ThuctapsinhController;
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

<<<<<<< HEAD
Route::prefix('/')->group(function(){
=======
// Route::prefix('/')->middleware(['auth'])->group(function(){
>>>>>>> 4ba6d1eb9dbc5ada03360f1366ca06a97f69d5a2
    Route::resource('/', AdminController::class);
    Route::resource('dotthuctap', DotthuctapController::class);
    Route::resource('nhom', NhomController::class);
    Route::resource('congviec', CongviecController::class);
    Route::resource('chucvu', ChucvuController::class);
    Route::resource('congty', CongtyController::class);
    Route::resource('taikhoan', TaikhoanController::class);
    // Route::post('/congty/create', [CongtyController::class, 'store']);
    // Route::post('/congty/{id}', [CongtyController::class, 'delete'])->name('deleteCongTy');
    // Route::get('/congty/capnhat/{id_congty}', [CongtyController::class, 'capnhatdanhmuc'])->name('capnhatdanhmuc');
    // Route::post('/congty/capnhat/{id_congty}', [CongtyController::class, 'capnhatdanhmuc_'])->name('capnhatdanhmuc');
    Route::resource('thuctapsinh', ThuctapsinhController::class);
    Route::resource('thamgianhom', ThamgianhomController::class);
// thuctapsinh.index

// });
require __DIR__.'/auth.php';


