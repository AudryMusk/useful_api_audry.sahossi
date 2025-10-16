<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Public routes, unprotected
Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {

    // Protected User API routes
    Route::get('/modules', [UserController::class, 'index']);
    // Route::get('/users/{id}', [UserController::class, 'show']);

    // // Protected Post API routes
    // Route::get('/posts', [PostController::class, 'index']);
    // Route::get('/posts/{id}', [PostController::class, 'show']);

    // Logout route
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
