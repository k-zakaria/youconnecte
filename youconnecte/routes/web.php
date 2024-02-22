<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AuthController;

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


Route::post('/register', [AuthController::class, 'store'])->name('user.register');
Route::get('/register', [AuthController::class, 'create']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('user.login');
Route::post('/login', [AuthController::class, 'login']);




Route::get('/', [MessageController:: class, 'index'])->name('post.index');
Route::post('/posts', [MessageController:: class, 'store'])->name('posts.store');
Route::put('/post/{id}', [MessageController:: class, 'update'])->name('update.post');
Route::get('/post/{id}/edit', [MessageController:: class, 'edit'])->name('edit.post');
Route::delete('/post/{id}', [MessageController::class, 'destroy'])->name('delete.post');


Route::get('/comments', [CommentController::class, 'index']);
Route::post('/comments', [CommentController::class, 'store']);