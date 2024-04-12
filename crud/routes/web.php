<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;

Route::get('/', [productController::class, 'index']);
Route::get('/create/product', [productController::class, 'create']);
Route::post('/store/product', [productController::class, 'store']);
Route::post('/update/{id}/product', [productController::class, 'update']);
Route::get('/product/{id}/edit', [productController::class, 'edit']);
Route::get('/product/{id}/delete', [productController::class, 'delete']);
