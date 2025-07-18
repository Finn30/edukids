<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Progress;
use Illuminate\Support\Facades\Auth;

class ProgressController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'game_id' => 'required|integer',
            'level' => 'required|integer',
            'completed_tasks' => 'required|integer',
        ]);

        $progress = Progress::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'game_id' => $request->game_id,
            ],
            [
                'level' => $request->level,
                'completed_tasks' => $request->completed_tasks,
            ]
        );

        return response()->json([
            'message' => 'Progress berhasil diperbarui',
            'data' => $progress
        ]);
    }

    public function index()
    {
        $progress = Progress::where('user_id', Auth::id())->get();

        return response()->json([
            'message' => 'Data progress user',
            'data' => $progress
        ]);
    }
}
