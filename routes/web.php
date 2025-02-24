<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumController;

// Home page route
Route::get('/', [ForumController::class, 'index'])->name('forums.index');
Route::get('/forums/create', [ForumController::class, 'create'])->name('forums.create');
Route::post('/forums/store', [ForumController::class, 'store'])->name('forums.store');
Route::get('/forums/{id}', [ForumController::class, 'show'])->name('forums.show');
Route::get('/forums/{id}/edit', [ForumController::class, 'edit'])->name('forums.edit');
Route::put('/forums/{id}', [ForumController::class, 'update'])->name('forums.update');
Route::delete('/forums/{id}', [ForumController::class, 'destroy'])->name('forums.destroy');

Route::post('/forums/storeComment', [ForumController::class, 'storeComment'])->name('forums.storeComment');
