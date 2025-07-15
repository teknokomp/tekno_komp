<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ProductCategoryController;
use App\Http\Controllers\Api\ProductController;

Route::apiResource(
    '/product-categories',
    ProductCategoryController::class
)->only('index');
Route::apiResource(
    '/products',
    ProductController::class
)->only('index');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
