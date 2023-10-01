<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\CreatePostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use GuzzleHttp\Cookie\SessionCookieJar;
use Illuminate\Contracts\Session\Session;
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
Route::post('post/comment/{id}', [CommentsController::class, 'store'])->name('comment.store');

Route::get('filter/{text}', [PostController::class, 'filter'])->name('filter');

Route::get('user/{id}', [PostController::class, 'profile'])->name('profile');

Route::get('author', [AuthorController::class, 'index'])->name('author');

// роуты для логина и регистрации

// добавление пользователей
Route::get('/register', [RegisterController::class, 'index'])->name('reg.home');
Route::post('/register', [RegisterController::class, 'store'])->name('reg.store');

// вход и выход

Route::get('/login', [SessionController::class, 'index'])->name('login');
Route::post('/login', [SessionController::class, 'login'])->name('login.log');
Route::get('/logout', [SessionController::class, 'destroy'])->name('logout');

// профиль

Route::get('/create', [CreatePostController::class, 'index'])->name('create.home');
Route::post('/create', [CreatePostController::class, 'store'])->name('create.store');

// добавление комментариев

// Route::get('/comment/{post_id}', [CommentsController::class, 'index'])->name('comment.home');

