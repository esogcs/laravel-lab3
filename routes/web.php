<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return redirect()->route('posts.index');
});

// List all posts
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// Show a single post with its comments
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

// Submit a new comment for a post
Route::post('/posts/{id}/comments', [CommentController::class, 'store'])->name('comments.store');
