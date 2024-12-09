<?php

use App\Http\Controllers\ForumController;

Route::get('/', function () {
    return view('welcome'); // Default Laravel welcome page
});

// Forum routes
Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
// Display a specific blog post
Route::get('/forum/blog/{id}', [ForumController::class, 'showBlog'])->name('forum.blog');

// Display comments for a specific blog
Route::get('/forum/blog/{id}/comments', [ForumController::class, 'showComments'])->name('forum.comments');

// Create a new blog post
Route::get('/forum/blog/create', [ForumController::class, 'createBlog'])->name('forum.blog.create');

