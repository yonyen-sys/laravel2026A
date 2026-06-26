<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum')->name('api.user');

Route::post('/register', [AuthController::class, 'register'])->name('api.register');
Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::get('/categories', [CategoryController::class, 'index'])->name('api.categories.index');

// Protect route
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/categories', [CategoryController::class, 'store'])->name('api.categories.store');
    Route::get('/profile', [AuthController::class, 'profile'])->name('api.profile');
    Route::post('/logout', [AuthController::class, 'logout'])->name('api.logout');
});

// route ApiResource Products
Route::apiResource('products', ProductController::class)->names('api.products');
