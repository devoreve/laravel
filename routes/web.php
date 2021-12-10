<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [DefaultController::class, 'home'])->name('homepage');
Route::get('/hello/{name}', [DefaultController::class, 'hello'])->name('hello');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::post('/posts/{id}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::post('/posts/{id}/update', [PostController::class, 'update'])->name('posts.update');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/user/register', [UserController::class, 'register'])->name('register');
Route::post('/user/register', [UserController::class, 'signup'])->name('signup');
Route::get('/user/login', [UserController::class, 'login'])->name('login');
Route::post('/user/login', [UserController::class, 'signin'])->name('signin');
Route::get('/user/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/test', [DefaultController::class, 'test'])->name('test');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');