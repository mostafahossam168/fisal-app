<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\MessageController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\UserController;

// F:\fisal\fisal-app\resources\views\dashboard\auth\sign-in.blade.php
Route::view('/', 'dashboard.auth.login')->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
Route::PUT('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');
Route::view('home', 'home')->name('home')->middleware(['web', 'admin']);
Route::resource('admins', AdminController::class)->middleware(['web', 'admin']);
Route::resource('users', UserController::class)->middleware(['web', 'admin']);
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class)->middleware(['web', 'admin']);
Route::post('products/bulk-delete', [ProductController::class, 'bulkDelete'])->name('products.bulk-delete');
Route::post('products/excel', [ProductController::class, 'excelProduct'])->middleware(['web', 'admin'])->name('products.store.excel');
Route::get('/settings', [SettingController::class, 'index'])->name('settings');
Route::post('/seetings', [SettingController::class, 'update'])->name('settings.update');
Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
Route::get('/messages/create', [MessageController::class, 'create'])->name('messages.create');
Route::post('/messages/store', [MessageController::class, 'store'])->name('messages.store');
Route::delete('/messages/destroy/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');
