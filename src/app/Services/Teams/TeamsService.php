<?php

namespace App\Services\Teams;

use App\Services\Teams\Contracts\TeamsServiceContract;
use App\Repositories\Teams\Contracts\TeamsRepositoryContract;

class TeamsService implements TeamsServiceContract
{
    private $teamRepository;

    public function __construct(TeamsRepositoryContract $teamRepository
    ) {
        $this->teamRepository = $teamRepository;
    }

     /**
     * @param  array  $params
     */
    public function store(array $params)
    {
       $this->teamRepository->updateOrCreate($params);
    }
}