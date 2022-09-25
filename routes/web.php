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

Route::prefix('/')->group(function(){
    Route::resource('/', AdminController::class);
    Route::resource('dotthuctap', DotthuctapController::class);
    Route::resource('nhom', NhomController::class);
    Route::resource('congviec', CongviecController::class);
    Route::resource('chucvu', ChucvuController::class);
    Route::resource('congty', CongtyController::class);
    Route::resource('taikhoan', TaikhoanController::class);
    Route::resource('thuctapsinh', ThuctapsinhController::class);
    Route::resource('thamgianhom',ThamgianhomController::class)->middleware('checktokenjoingroup');
    Route::post('abc',[NhomController::class,'get_Dot'])->name('taolao');
    Route::get('delete-member',[NhomController::class,'delete_memberGroup'])->name('deleteMember');
// thuctapsinh.index
<<<<<<< HEAD

=======
    Route::get('sendmailthuctapsinh',function(){
        return view('email.Sendmailthuctapsinh');
    });
>>>>>>> f80d02421d463d74cca9598628fb343dc64e64fa
});
require __DIR__.'/auth.php';


