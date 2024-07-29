<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\web\HomeController;

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
Route::get('language/{language}', [HomeController::class, 'language'])->name('language');
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/hoat-dong', [HomeController::class, 'activity'])->name('activity');
Route::get('/chinh-sach-bao-mat', [HomeController::class, 'policy'])->name('policy');
Route::get('/gioi-thieu-ve-duc-thanh', [HomeController::class, 'introduce'])->name('introduce');
Route::get('/chi-tiet-san-pham/{slug}', [HomeController::class, 'detailProduct'])->name('detail-product');
Route::get('/lien-he', [HomeController::class, 'contact'])->name('contact');
Route::post('/save-contact', [HomeController::class, 'saveContact'])->name('save-contact');
Route::get('/danh-muc', [HomeController::class, 'category'])->name('category');
Route::get('/danh-muc/{slug}', [HomeController::class, 'categoryProduct'])->name('category-product');
Route::get('/tim-kiem', [HomeController::class, 'search'])->name('search');

