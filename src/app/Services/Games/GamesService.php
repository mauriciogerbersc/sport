<?php

namespace App\Services\Games;

use App\Services\Games\Contracts\GamesServiceContract;
use App\Repositories\Games\Contracts\GamesRepositoryContract;

class GamesService implements GamesServiceContract
{
    private $gamesRepository;

    public function __construct(
        GamesRepositoryContract $gamesRepository
    ) {
        $this->gamesRepository = $gamesRepository;
    }

    /**
     * @param  array  $params
     */
    public function storeBatch(array $games)
    {
        foreach ($games as $game) {
            $this->gamesRepository->updateOrCreate($game);
        }
    }
}