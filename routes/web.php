<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Web\HomeController;

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
Route::get('chinh-sach-bao-mat', [HomeController::class, 'policy'])->name('policy');

Route::middleware('auth')->group(function () {

});
