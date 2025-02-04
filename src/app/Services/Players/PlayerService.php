<?php

namespace App\Services\Players;

use App\Services\Players\Contracts\PlayerServiceContract;
use App\Repositories\Players\Contracts\PlayerRepositoryContract;

class PlayerService implements PlayerServiceContract
{
    private $playerRepository;

    public function __construct(
        PlayerRepositoryContract $playerRepository
    ) {
        $this->playerRepository = $playerRepository;
    }

    /**
     * @return array
     */
    public function all(): array
    {
        return $this->playerRepository->getWithRelation('team')->toArray();
    }

    /**
     * @param  array  $params
     */
    public function storeBatch(array $players)
    {
        foreach ($players as $player) {
            $this->playerRepository->updateOrCreate($player);
        }
    }

    /**
     * @param  array  $params
     */
    public function store(array $player)
    {
        return $this->playerRepository->store(
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
                'team_id' => $player['team_id']
            ]
        )->toArray();
    }

    public function update(array $player, int $id)
    {
        return $this->playerRepository->updateById($player, $id);
    }

    public function delete(int $id)
    {
        return $this->playerRepository->delete($id);
    }
}
