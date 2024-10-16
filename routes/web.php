<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ImageUploadController;

use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\BlogController;

use App\Http\Controllers\Frontend\HomeController;

// 認證路由
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 密碼重置請求表單
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

// 處理發送重置郵件的請求
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// 顯示密碼重置表單
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

// 處理密碼重置請求
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// 顯示註冊表單
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');

// 處理註冊請求
Route::post('register', [RegisterController::class, 'register'])->name('register.submit');


// 保護後端路由
Route::group(['middleware' => ['auth'], 'prefix' => 'backend', 'as' => 'backend.'], function () {
    Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard');

    // 產品管理路由
    Route::resource('products', ProductController::class);

    // 選單管理路由
    Route::resource('menus', MenuController::class);

    // 分類管理路由
    Route::resource('categories', CategoryController::class);

    // 文章管理路由
    Route::resource('blogs', BlogController::class);
});

// 默認重定向
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/upload-image', [ImageUploadController::class, 'store'])->name('image.upload');
