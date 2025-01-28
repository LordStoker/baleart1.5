<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\SpaceController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function(){
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::put('/user/{value}', [UserController::class, 'update']);
    // Route::get('/user', [UserController::class, 'index']); 
    Route::get('/user/{user}', [UserController::class, 'show']); 
    Route::post('/user', [UserController::class, 'store']);
    Route::delete('/user/{user}', [UserController::class, 'destroy']);
    Route::post('/space/{space}/comment', [SpaceController::class, 'storeComment']);
    Route::apiresource('space', SpaceController::class); 
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
