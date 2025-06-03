<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VillaController;
use App\Http\Controllers\GaleriController;

Route::middleware('auth:sanctum')->group(function () {
    Route::put('/villa/{id}/status', [VillaController::class, 'updateStatus']);
});
Route::post('/login', [AuthController::class, 'login']);
Route::apiResource('galeri', GaleriController::class)->middleware('auth:sanctum');

// Route::middleware('auth:sanctum')->get('/me', [AuthController::class, 'me']);
// Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
