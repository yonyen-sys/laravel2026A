<?php

use App\Http\Controllers\CategoryContorller;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return "Hello World";
});

Route::get('/myfather', function () {
    return "I love my father";
});

// Route::get('/users',function(){
//     return view('user');
// });

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
