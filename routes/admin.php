<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;


// Route::middleware('guest:admin')->group(function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login_process');
// });

Route::middleware('auth:admin')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    // работа с постами
    Route::get('posts', [AdminController::class, 'index'])->name('home');
    Route::put('post/{id}', [AdminController::class, 'submit'])->name('submit');
    Route::delete('post/{id}', [AdminController::class, 'delete'])->name('delete');
    // Route::resource('posts', PostController::class);
});
