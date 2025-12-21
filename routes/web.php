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
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/dashboard', function () {
        $products = \App\Models\Product::all();
        return view('admin.dashboard', compact('products'));
    })->name('admin.dashboard');
    
    Route::get('/products/{id}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit.admin');
    Route::put('/products/{id}', [App\Http\Controllers\ProductController::class, 'update']); 
    Route::delete('/products/{id}', [App\Http\Controllers\ProductController::class, 'destroy']);
});

// Group Seller
Route::prefix('seller')->middleware('seller')->group(function () {
    Route::get('/dashboard', function () {
        $products = \App\Models\Product::all();
        return view('seller.dashboard', compact('products'));
    })->name('seller.dashboard');
    
    Route::get('/products/create', [App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit.seller');
    Route::put('/products/{id}', [App\Http\Controllers\ProductController::class, 'update']);
});

// Group Buyer
Route::prefix('buyer')->middleware('buyer')->group(function () {
    Route::get('/dashboard', function () {
        $products = \App\Models\Product::all();
        return view('buyer.dashboard', compact('products')); 
    })->name('buyer.dashboard');
    
    Route::post('/cart/{productId}', [App\Http\Controllers\CartController::class, 'store'])->name('cart.add');
});
