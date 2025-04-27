<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SettingController;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');



Route::group(
    ['controller' => AuthController::class],
    function () {
        Route::post('login', 'login');
        Route::get('profile', 'profile')->middleware('auth:api');
        Route::post('logout', 'logout')->middleware('auth:api');
    }
);
Route::group(
    ['controller' => ProductController::class, 'prefix' => 'products'],
    function () {
        Route::get('/', 'index')->middleware('auth:api');
        Route::get('/show/{id}', 'show')->middleware('auth:api');
    }
);

Route::get('/notifications', [NotificationController::class, 'index'])->middleware('auth:api');
Route::get('/settings', [SettingController::class, 'index'])->middleware('auth:api');