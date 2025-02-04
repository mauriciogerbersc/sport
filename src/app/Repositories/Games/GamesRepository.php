<?php

namespace App\Repositories\Games;

use App\Models\Game;
use App\Repositories\BaseRepository;
use App\Repositories\Games\Contracts\GamesRepositoryContract;

class GamesRepository extends BaseRepository implements GamesRepositoryContract
{
    protected $model;

    public function __construct(Game $game)
    {
        $this->model = $game;
    }
    
    public function updateOrCreate(array $game)
    {
        $this->model->updateOrCreate(
            ['id' => $game['id']],
            [
                'date' => $game['date'],
                'season' => $game['season'],
                'status' => $game['status'],
                'period' => $game['period'],
                'time' => $game['time'],
                'postseason' => $game['postseason'],
                'home_team_score' => $game['home_team_score'],
                'visitor_team_score' => $game['visitor_team_score'],
                'home_team' => $game['home_team']['id'],
                'visitor_team' => $game['visitor_team']['id']
            ]
        );
    }
}