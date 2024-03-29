<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProphileController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\User;

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


Route::middleware(['User'])->group(function () {
    Route::get('/', [MessageController::class, 'index'])->name('post.index');
    Route::post('/posts', [MessageController::class, 'store'])->name('posts.store');
    Route::put('/post/{id}', [MessageController::class, 'update'])->name('update.post');
    Route::get('/post/{id}/edit', [MessageController::class, 'edit'])->name('edit.post');
    Route::delete('/post/{id}', [MessageController::class, 'destroy'])->name('delete.post');

    Route::get('/comments', [CommentController::class, 'index']);
    Route::post('/comments', [CommentController::class, 'store']);
    Route::post('/like', [MessageController::class, 'like'])->name('posts.like');

    Route::delete('/delete-account/{user}', [AuthController::class, 'deleteMyAccount'])->name('posts.delete-account');
    Route::get('/logout', [AuthController::class, 'logout'])->name('user.logout');
    Route::get('/profile', [AuthController::class, 'profile'])->name('user.profile');
    Route::put('/post/{id}', [MessageController::class, 'update'])->name('update.post');
    Route::get('/post/{id}/edit', [MessageController::class, 'edit'])->name('edit.post');
    Route::delete('/post/{id}', [MessageController::class, 'destroy'])->name('delete.post');


    Route::post('/comments/{message}', [CommentController::class, 'store'])->name('comments.store');


    Route::post('/like', [MessageController::class, 'like'])->name('posts.like');


    Route::get('/search', [AuthController::class, 'showSearch'])->name('search');
    Route::get('/search/users', [AuthController::class, 'searchUsers'])->name('search.users');

    Route::post('/subscribe/{user}', [AuthController::class, 'subscribe'])->name('user.subscribe');
    Route::delete('/unsubscribe/{user}', [AuthController::class, 'unsubscribe'])->name('user.unsubscribe');
});
