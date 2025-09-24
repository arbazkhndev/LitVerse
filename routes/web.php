<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\UserController;




// ✅ Home → Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// ✅ Books CRUD (resourceful routes)
Route::resource('books', BookController::class);


Route::resource('orders', OrderController::class);


Route::resource('competitions', CompetitionController::class);


Route::resource('submissions', SubmissionController::class);


Route::resource('users', UserController::class)->only(['index','edit','update','destroy']);
