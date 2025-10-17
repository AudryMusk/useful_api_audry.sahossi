<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckModuleActive;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Public routes, unprotected
Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/modules', [UserController::class, 'showModules']);
    Route::post('/modules/{id}/activate', [UserController::class, 'activateModule']);
    Route::post('/modules/{id}/desactivate', [UserController::class, 'desactivateModule']);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
