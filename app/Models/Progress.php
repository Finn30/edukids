<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Progress extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'game_id', 'level', 'completed_tasks'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
