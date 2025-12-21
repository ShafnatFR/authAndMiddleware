<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/dashboard', function () {
        return 'Admin Dashboard';
    })->name('admin.dashboard');
});

Route::prefix('seller')->middleware('auth:seller')->group(function () {
    Route::get('/dashboard', function () {
        return 'Seller Dashboard';
    })->name('seller.dashboard');
});

Route::prefix('buyer')->middleware('auth:buyer')->group(function () {
    Route::get('/dashboard', function () {
        return 'Buyer Dashboard';
    })->name('buyer.dashboard');
});
