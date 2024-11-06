<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

// Route::get('/', function () {
//     return view('upload');
// });

Route::get('/', [ImageController::class, 'index'])->name('upload');
Route::post('/store', [ImageController::class, 'store'])->name('image.store');
// Route::post('/store', [ImageController::class, 'store'])->name('image.store');
