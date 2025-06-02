<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VillaController;
use App\Http\Controllers\FeedbackController;

Route::middleware('auth:sanctum')->group(function () {
    Route::put('/villa/{id}/status', [VillaController::class, 'updateStatus']);
});
Route::post('/login', [AuthController::class, 'login']);
Route::post('/feedback', [FeedbackController::class, 'store']); // client kirim
Route::middleware('auth:sanctum')->get('/admin/feedback', [FeedbackController::class, 'index']); // hanya admin lihat
