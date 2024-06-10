<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'captain_name',
        'captain_game_id',
        'tournament_id',
        'user_id',  // Add user_id here
    ];

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }
}
