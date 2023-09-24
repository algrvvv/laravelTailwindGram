<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class,'index'])->name('home');

Route::get('post/{user_id}/{id}', [PostController::class, 'show'])->name('post');

// Route::get('search/{text}', [PostController::class, 'search'])->name('search');

Route::get('filter/{text}', [PostController::class, 'filter'])->name('filter');

Route::get('user/{id}', [PostController::class, 'profile'])->name('profile');

Route::get('author', [AuthorController::class, 'index'])->name('author');