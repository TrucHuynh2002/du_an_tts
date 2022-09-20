<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChucvuController;
use App\Http\Controllers\CongtyController;
use App\Http\Controllers\CongviecController;
use App\Http\Controllers\DotthuctapController;
use App\Http\Controllers\NhomController;
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

Route::resource('/', AdminController::class);
Route::resource('dotthuctap', DotthuctapController::class);
Route::resource('nhom', NhomController::class);
Route::resource('congviec', CongviecController::class);
Route::resource('chucvu', ChucvuController::class);
Route::resource('congty', CongtyController::class);
Route::resource('thuctapsinh', ThuctapsinhController::class);

<<<<<<< HEAD
//thay đổi 123
//andrei stony thay đổi

=======
>>>>>>> 47792e1382f4d3df1346b60c1c87622a649fff6e
