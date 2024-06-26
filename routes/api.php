<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/books', [BookController::class, 'create']);
Route::post('/authors', [AuthorController::class, 'create']);
Route::get('/books/{book:slug}', [BookController::class, 'show']);
Route::get('/authors/{author:slug}', [AuthorController::class, 'show']);
Route::get('/books/{bookId}', [BookController::class, 'getById']);
Route::get('/authors/{authorId}', [AuthorController::class, 'getById']);
