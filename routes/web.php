<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PortfolioController;

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
Route::get('/portfolio/of/{category}', [App\Http\Controllers\IndexController::class, 'portfolioByCategory'])->name('portfolio.by_category');
Route::get('/contact-us',[App\Http\Controllers\IndexController::class, 'contactUs'])->name('contactUs');
Route::get('/about-us',[App\Http\Controllers\IndexController::class, 'aboutUs'])->name('aboutUs');
Route::post('/enquiry', [EnquiryController::class, 'store'])->name('enquiry.store');


//Admin Controller
Route::get('/admin/login',[App\Http\Controllers\AdminController::class, 'login'])->name('login');
Route::post('/admin/loginCheck',[App\Http\Controllers\AdminController::class, 'loginCheck'])->name('loginCheck');
Route::middleware('auth:sanctum')->get('/admin/dashboard',[App\Http\Controllers\AdminController::class, 'index'])->name('admin/dashboard');
Route::middleware('auth:sanctum')->get('/admin/cms',[App\Http\Controllers\AdminController::class, 'cms'])->name('admin/cms');
Route::middleware('auth:sanctum')->get('/admin/blogs',[App\Http\Controllers\AdminController::class, 'blogs'])->name('admin/blogs');
Route::middleware('auth:sanctum')->get('/admin/portfolio',[App\Http\Controllers\AdminController::class, 'portfolio'])->name('admin/portfolio');
Route::middleware('auth:sanctum')->get('/admin/portfolio/categories',[App\Http\Controllers\AdminController::class, 'Categories'])->name('admin/portfolio/categories');
Route::middleware('auth:sanctum')->get('/admin/enquiries',[App\Http\Controllers\AdminController::class, 'enquiries'])->name('admin/enquiries');
Route::middleware('auth:sanctum')->delete('/enquiries/{id}', [EnquiryController::class, 'delete']);
Route::middleware('auth:sanctum')->get('/admin/enquiries/{id}', [EnquiryController::class, 'view'])->name('enquiry.view');
Route::middleware('auth:sanctum')->post('/admin/categories/add', [CategoryController::class, 'store'])->name('categories.store');
Route::middleware('auth:sanctum')->put('/admin/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::middleware('auth:sanctum')->delete('/admin/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::middleware('auth:sanctum')->post('/admin/portfolio/store', [PortfolioController::class, 'store'])->name('admin.portfolio.store');
Route::middleware('auth:sanctum')->put('/admin/portfolio/update', [PortfolioController::class, 'update'])->name('admin.portfolio.update');
Route::middleware('auth:sanctum')->get('/admin/portfolio/{id}/edit', [PortfolioController::class, 'edit']);
Route::middleware('auth:sanctum')->delete('/admin/portfolio/{id}', [PortfolioController::class, 'destroy'])->name('portfolio.destroy');
