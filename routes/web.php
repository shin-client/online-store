<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('welcome'));
Route::get('/products', fn() => view('products'))->name('products');
Route::get('/about', fn() => view('about'))->name('about');