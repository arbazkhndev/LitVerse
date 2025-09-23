<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/',[DashboardController::class,'index']);

Route::get('/products', [ProductController::class,'index']);
Route::get('/addProduct', [ProductController::class,'create']);
Route::post('/createProduct', [ProductController::class,'store']);
Route::get('/editProduct/{id}', [ProductController::class,'edit']);
Route::put('/updateProduct/{id}',[ProductController::class, 'update']);