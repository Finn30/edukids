<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ScoreController;
use App\Http\Controllers\Api\ProgressController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', fn(Request $request) => $request->user());

    Route::get('/profile', function (Request $request) {
        return response()->json([
            'message' => 'Ini data profile',
            'user' => $request->user()
        ]);
    });

    Route::post('/score', [ScoreController::class, 'store']);
    Route::get('/leaderboard/{game_id}', [ScoreController::class, 'leaderboard']);

    Route::post('/progress', [ProgressController::class, 'store']);
    Route::get('/progress', [ProgressController::class, 'index']);
});
