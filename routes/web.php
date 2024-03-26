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

//Index Controller
Route::get('/',[App\Http\Controllers\IndexController::class, 'index']);
Route::get('/portfolio',[App\Http\Controllers\IndexController::class, 'portfolio'])->name('portfolio');

//Admin Controller
Route::get('/admin/login',[App\Http\Controllers\AdminController::class, 'login'])->name('admin/login');
Route::get('/admin/dashboard',[App\Http\Controllers\AdminController::class, 'index'])->name('admin/dashboard');
Route::get('/admin/cms',[App\Http\Controllers\AdminController::class, 'cms'])->name('admin/cms');
Route::get('/admin/blogs',[App\Http\Controllers\AdminController::class, 'blogs'])->name('admin/blogs');
Route::get('/admin/portfolio',[App\Http\Controllers\AdminController::class, 'portfolio'])->name('admin/portfolio');
Route::get('/admin/enquiries',[App\Http\Controllers\AdminController::class, 'enquiries'])->name('admin/enquiries');


