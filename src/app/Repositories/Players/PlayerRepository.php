<?php

namespace App\Repositories\Players;

use App\Models\Player;
use App\Repositories\BaseRepository;
use App\Repositories\Players\Contracts\PlayerRepositoryContract;

class PlayerRepository extends BaseRepository implements PlayerRepositoryContract
{
    protected $model;

    public function __construct(Player $players)
    {
        $this->model = $players;
    }

    public function updateOrCreate(array $player)
    {
        $this->model->updateOrCreate(
            ['id' => $player['id']],
            [
                'first_name' => $player['first_name'],
                'last_name' => $player['last_name'],
                'position' => $player['position'],
                'height' => $player['height'],
                'weight' => $player['weight'],
                'jersey_number' => $player['jersey_number'],
                'college' => $player['college'],
                'country' => $player['country'],
                'draft_year' => $player['draft_year'],
                'draft_round' => $player['draft_round'],
                'draft_number' => $player['draft_number'],
                'team_id' => $player['team']['id']
            ]
        );
    }
}
