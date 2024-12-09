<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumController;

// Home page route
Route::get('/', function () {
    return view('welcome');
});

// Forum routes
Route::resource('forums', ForumController::class);