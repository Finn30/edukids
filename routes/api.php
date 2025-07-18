<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ScoreController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/profile', function (Request $request) {
    return response()->json([
        'message' => 'Ini data profile',
        'user' => $request->user()
    ]);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/score', [ScoreController::class, 'store']);
    Route::get('/leaderboard/{game_id}', [ScoreController::class, 'leaderboard']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
