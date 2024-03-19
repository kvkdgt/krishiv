<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[App\Http\Controllers\IndexController::class, 'index']);
Route::get('/admin/dashboard',[App\Http\Controllers\AdminController::class, 'index'])->name('admin/dashboard');
Route::get('/admin/cms',[App\Http\Controllers\AdminController::class, 'cms'])->name('admin/cms');
Route::get('/admin/blogs',[App\Http\Controllers\AdminController::class, 'blogs'])->name('admin/blogs');
Route::get('/admin/enquiries',[App\Http\Controllers\AdminController::class, 'enquiries'])->name('admin/enquiries');


