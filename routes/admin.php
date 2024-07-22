<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\admin\LoginController;
use \App\Http\Controllers\admin\DashboardController;
use \App\Http\Controllers\admin\BannerController;
use \App\Http\Controllers\admin\PolicyController;
use \App\Http\Controllers\admin\IntroduceController;
use \App\Http\Controllers\admin\SettingController;
use \App\Http\Controllers\admin\ContactController;
use \App\Http\Controllers\admin\CategoryController;
use \App\Http\Controllers\admin\ProductController;
use \App\Http\Controllers\admin\VideoController;
use \App\Http\Controllers\admin\ImageController;


Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/dologin', [LoginController::class, 'doLogin'])->name('doLogin');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('check-admin-auth')->group(function () {
    Route::get('', [DashboardController::class, 'index'])->name('index');

    Route::prefix('banner')->name('banner.')->group(function () {
        Route::get('/', [BannerController::class, 'index'])->name('index');
        Route::get('create', [BannerController::class, 'create'])->name('create');
        Route::post('store', [BannerController::class, 'store'])->name('store');
        Route::get('delete/{id}', [BannerController::class, 'delete']);
        Route::get('edit/{id}', [BannerController::class, 'edit']);
        Route::post('update/{id}', [BannerController::class, 'update']);
    });

    Route::prefix('policy')->name('policy.')->group(function () {
        Route::get('/', [PolicyController::class, 'index'])->name('index');
        Route::get('create', [PolicyController::class, 'create'])->name('create');
        Route::post('store', [PolicyController::class, 'store'])->name('store');
        Route::get('delete/{id}', [PolicyController::class, 'delete']);
        Route::get('edit/{id}', [PolicyController::class, 'edit']);
        Route::post('update/{id}', [PolicyController::class, 'update']);
    });

    Route::prefix('introduce')->name('introduce.')->group(function () {
        Route::get('/', [IntroduceController::class, 'index'])->name('index');
        Route::get('create', [IntroduceController::class, 'create'])->name('create');
        Route::post('store', [IntroduceController::class, 'store'])->name('store');
        Route::get('delete/{id}', [IntroduceController::class, 'delete']);
        Route::get('edit/{id}', [IntroduceController::class, 'edit']);
        Route::post('update/{id}', [IntroduceController::class, 'update']);
    });

    Route::prefix('setting')->name('setting.')->group(function () {
        Route::get('', [SettingController::class, 'index'])->name('index');
        Route::post('update', [SettingController::class, 'save'])->name('update');
    });

    Route::prefix('contact')->name('contact.')->group(function () {
        Route::get('', [ContactController::class, 'index'])->name('index');
        Route::get('delete/{id}', [ContactController::class, 'delete'])->name('delete');
    });

    Route::prefix('category')->name('category.')->group(function () {
        Route::get('', [CategoryController::class, 'index'])->name('index');
        Route::get('create', [CategoryController::class, 'create'])->name('create');
        Route::post('store', [CategoryController::class, 'store'])->name('store');
        Route::get('delete/{id}', [CategoryController::class, 'delete']);
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [CategoryController::class, 'update'])->name('update');
    });

    Route::prefix('product')->name('product.')->group(function () {
        Route::get('', [ProductController::class, 'index'])->name('index');
        Route::get('create', [ProductController::class, 'create'])->name('create');
        Route::post('store', [ProductController::class, 'store'])->name('store');
        Route::get('edit/{id}', [ProductController::class, 'edit']);
        Route::post('update/{id}', [ProductController::class, 'update'])->name('update');
        Route::get('delete/{id}', [ProductController::class, 'delete']);
    });

    Route::prefix('product-video')->name('product-video.')->group(function () {
        Route::get('index/{id}', [ProductController::class, 'indexVideo'])->name('index-video');
        Route::get('create-video/{id}', [ProductController::class, 'createVideo'])->name('create-video');
        Route::post('store-video/{id}', [ProductController::class, 'storeVideo'])->name('store-video');
        Route::get('edit-video/{id}', [ProductController::class, 'editVideo']);
        Route::post('update-video/{id}', [ProductController::class, 'updateVideo'])->name('update-video');
        Route::get('delete-video/{id}', [ProductController::class, 'deleteVideo']);
    });

    Route::prefix('video')->name('video.')->group(function () {
        Route::get('', [VideoController::class, 'index'])->name('index');
        Route::get('create', [VideoController::class, 'create'])->name('create');
        Route::post('store', [VideoController::class, 'store'])->name('store');
        Route::get('edit/{id}', [VideoController::class, 'edit']);
        Route::post('update/{id}', [VideoController::class, 'update'])->name('update');
        Route::get('delete/{id}', [VideoController::class, 'delete']);
    });

    Route::prefix('image')->name('image.')->group(function () {
        Route::get('', [ImageController::class, 'index'])->name('index');
        Route::get('create', [ImageController::class, 'create'])->name('create');
        Route::post('store', [ImageController::class, 'store'])->name('store');
        Route::get('edit/{id}', [ImageController::class, 'edit']);
        Route::post('update/{id}', [ImageController::class, 'update'])->name('update');
        Route::get('delete/{id}', [ImageController::class, 'delete']);
    });

});

Route::post('ckeditor/upload', [DashboardController::class, 'upload'])->name('ckeditor.image-upload');
