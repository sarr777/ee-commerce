<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Duplique la route /user en /me pour correspondre parfaitement au code Angular de votre prof
Route::get('/me', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('categories', \App\Http\Controllers\CategoryController::class);
Route::apiResource('produits', \App\Http\Controllers\ProduitController::class);
Route::apiResource('posts', \App\Http\Controllers\PostController::class);
Route::apiResource('services', \App\Http\Controllers\ServiceController::class);
Route::apiResource('commandes', \App\Http\Controllers\CommandeController::class);
Route::apiResource('element-commandes', \App\Http\Controllers\ElementCommandeController::class);

// Les routes d'authentification que votre Angular essaie d'appeler
Route::post('/register', [\App\Http\Controllers\Auth\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\Auth\AuthController::class, 'login']);
Route::post('/logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])->middleware('auth:sanctum');
