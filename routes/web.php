<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChucvuController;
use App\Http\Controllers\CongtyController;
use App\Http\Controllers\CongviecController;
use App\Http\Controllers\DotthuctapController;
use App\Http\Controllers\NhomController;
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
    Route::get('fileQL',[NhomController::class,'downloadQL'])->name('downloadQL');
    Route::get('fileNT',[NhomController::class,'downloadNT'])->name('downloadNT');
    Route::get('chi-tiet-nhom/{id}',[NhomController::class,'detailtGroup'])->name('detailtGroup');
    Route::get('xemcongviec', [CongviecController::class,'detailt']);
    Route::get('deleteuserwork/{id}',[CongviecController::class,'deleteUserWork'])->name('deleteuserwork');
    Route::get('cong-viec/{id}',[CongviecController::class,'detailJob'])->name('detailJob');
    Route::get('tien-do-cong-viec/{id}',[CongviecController::class,'detailtJobGroup'])->name('detailtJobGroup');
    Route::post('cap-nhat-tien-do-cong-viec/{id}',[CongviecController::class,'update_job'])->name('updateJob');
    Route::resource('congviec', CongviecController::class);
    Route::resource('chucvu', ChucvuController::class);
    Route::resource('congty', CongtyController::class);
    Route::get('taikhoan/{id}', [ThuctapsinhController::class,'get_profile'])->name('get_profile');
    Route::resource('thuctapsinh', ThuctapsinhController::class);
    Route::resource('thamgianhom',ThamgianhomController::class)->middleware('checktokenjoingroup');
    Route::post('abc',[NhomController::class,'get_Dot'])->name('taolao');
    Route::get('delete-member',[NhomController::class,'delete_memberGroup'])->name('deleteMember');
// thuctapsinh.index
    Route::get('sendmailthuctapsinh',function(){
        return view('email.Sendmailthuctapsinh');
    });
    Route::get('sendmailquenmatkhau',function(){
        return view('email.Sendmailquenmatkhau');
    });
    Route::get('sendmaildoimatkhauthanhcong',function(){
        return view('email.Sendmaildoimatkhauthanhcong');
    });
    
});
require __DIR__.'/auth.php';
