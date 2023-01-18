<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('posts',\App\Http\Controllers\PostController::class);
Route::post('posts/{post}/comments', [\App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');
