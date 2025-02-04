<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'id',
        'date',
        'season',
        'status',
        'period',
        'time',
        'postseason',
        'home_team_score',
        'visitor_team_score',
        'home_team',
        'visitor_team',
    ];
}
