<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryContorller;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});

// Auth routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])
        ->name('login');
    Route::post('/login', [LoginController::class, 'login'])
        ->name('login.submit');
});

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Authenticated app pages
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/hello', function () {
        return "Hello World";
    });

    Route::get('/myfather', function () {
        return "I love my father";
    });

    Route::get('/users', [UserController::class, 'index'])
        ->name('users.index');
    Route::get('/customers', [CustomerController::class, 'index'])
        ->name('customers.index');
    Route::get('/users/{id}', [UserController::class, 'show'])
        ->name('users.show')
        ->where('id', '[0-9]+');
    Route::get('/users/{username}/{email}', [UserController::class, 'getUserNameEmail'])
        ->name('users.getUserNameEmail');

    // category route
    Route::get('/categories', [CategoryContorller::class, 'index'])
        ->name('categoies.index');
    Route::get('/categories/create', [CategoryContorller::class, 'create'])
        ->name('categoies.create');
    Route::post('/categories/store', [CategoryContorller::class, 'store'])
        ->name('categories.store');
    Route::get('/categories/{id}', [CategoryContorller::class, 'edit'])
        ->name('categories.edit');
    Route::put('/categories/{id}', [CategoryContorller::class, 'update'])
        ->name('categories.update');
    Route::delete('/categories/{id}', [CategoryContorller::class, 'destroy'])
        ->name('categories.destroy');

    // products
    Route::get('/products', [ProductController::class, 'index'])
        ->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])
        ->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])
        ->name('products.store');
    Route::get('/products/{product}', [ProductController::class, 'show'])
        ->name('products.show');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])
        ->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])
        ->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])
        ->name('products.destroy');
});
