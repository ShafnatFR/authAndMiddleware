<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

// Group Admin
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard'); 
    })->name('admin.dashboard');
    
    Route::put('/products/{id}', [App\Http\Controllers\ProductController::class, 'update']); 
    Route::delete('/products/{id}', [App\Http\Controllers\ProductController::class, 'destroy']);
});

// Group Seller
Route::prefix('seller')->middleware('auth:seller')->group(function () {
    Route::get('/dashboard', function () {
        return view('seller.dashboard'); 
    })->name('seller.dashboard');
    
    Route::get('/products/create', [App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');
    Route::put('/products/{id}', [App\Http\Controllers\ProductController::class, 'update']);
});

// Group Buyer
Route::prefix('buyer')->middleware('auth:buyer')->group(function () {
    Route::get('/dashboard', function () {
        return view('buyer.dashboard'); 
    })->name('buyer.dashboard');
    
    Route::post('/cart/{productId}', [App\Http\Controllers\CartController::class, 'store'])->name('cart.add');
});
