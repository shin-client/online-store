<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::prefix('products')->name('products.')->group(function () {
    Route::get('/trash', [ProductController::class, 'trash'])->name('trash');
    Route::post('/{id}/restore', [ProductController::class, 'restore'])->name('restore');
    Route::delete('/{id}/force-delete', [ProductController::class, 'forceDelete'])->name('forceDelete');
});
Route::resource('products', ProductController::class);
Route::get('/about', [HomeController::class, 'about'])->name('about');
