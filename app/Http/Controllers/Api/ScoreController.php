<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Score;
use Illuminate\Support\Facades\Auth;

class ScoreController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'game_id' => 'required|integer',
            'score' => 'required|integer'
        ]);

        $score = Score::create([
            'user_id' => Auth::id(),
            'game_id' => $request->game_id,
            'score' => $request->score
        ]);

        return response()->json([
            'message' => 'Score berhasil disimpan',
            'data' => $score
        ]);
    }

    public function leaderboard($game_id)
    {
        $scores = Score::where('game_id', $game_id)
            ->with('user:id,name,email')
            ->orderByDesc('score')
            ->take(10)
            ->get();

        return response()->json([
            'message' => 'Top 10 Leaderboard',
            'data' => $scores
        ]);
    }
}
