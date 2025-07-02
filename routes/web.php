<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/',[UserController::class,'dashboard'])->name('dashboard');
Route::get('/user',[UserController::class,'index'])->name('users.index');

Route::resource('products',ProductController::class);
