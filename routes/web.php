<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products'); // name để alias cho route này
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/about', [HomeController::class, 'about'])->name('about');
