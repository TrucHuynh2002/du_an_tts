<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChucvuController;
use App\Http\Controllers\CongtyController;
use App\Http\Controllers\CongviecController;
use App\Http\Controllers\DotthuctapController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FileManagerController;
use App\Http\Controllers\NhomController;
use App\Http\Controllers\ThamgianhomController;
use App\Http\Controllers\ThuctapsinhController;
use App\Http\Middleware\QuanTriVien;
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

Route::prefix('/')->middleware(['auth'])->group(function(){
    Route::resource('/', AdminController::class);

    Route::middleware(['auth.qtv'])->prefix('/quantrivien')->name('qtv.')->group(function(){
        Route::resource('congty', CongtyController::class);
        // Route::resource('chucvu', ChucvuController::class);
        Route::resource('dotthuctap', DotthuctapController::class);
    });
    Route::resource('thuctapsinh', ThuctapsinhController::class);
    Route::resource('nhom', NhomController::class);
    Route::resource('congviec', CongviecController::class);
    Route::resource('thamgianhom',ThamgianhomController::class)->middleware('checktokenjoingroup');
    Route::resource('file', FileController::class);
    Route::get('get-file/{id}',[FileController::class,'getFile'])->name('get_file');
        Route::post('download-all',[FileController::class,'downloadAll'])->name('downloadAll');
    Route::resource('qlfile', FileManagerController::class);
    Route::get('download-file/{id}',[FileController::class,'getDownload'])->name('downloadFile');

    // Route::get('fileNT',[NhomController::class,'downloadNT'])->name('downloadNT');
    Route::get('xemcongviec', [CongviecController::class,'detailt']);
    Route::get('cong-viec/{id}',[CongviecController::class,'detailJob'])->name('detailJob');
    Route::get('tien-do-cong-viec/{id}',[CongviecController::class,'detailtJobGroup'])->name('detailtJobGroup');
    Route::get('delete-member',[NhomController::class,'delete_memberGroup'])->name('deleteMember');
    Route::get('taikhoan/{id}', [ThuctapsinhController::class,'get_profile'])->name('get_profile');
    Route::get('chi-tiet-nhom/{id}',[NhomController::class,'detailtGroup'])->name('detailtGroup');
    Route::get('deleteuserwork/{id}',[CongviecController::class,'deleteUserWork'])->name('deleteuserwork');
    Route::post('cap-nhat-tien-do-cong-viec',[CongviecController::class,'update_job'])->name('updateJob');

    Route::post('abc',[NhomController::class,'get_Dot'])->name('taolao');

});
require __DIR__.'/auth.php';
