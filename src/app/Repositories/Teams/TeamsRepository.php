<?php

namespace App\Repositories\Teams;

use App\Models\Team;
use App\Repositories\BaseRepository;
use App\Repositories\Teams\Contracts\TeamsRepositoryContract;

class TeamsRepository extends BaseRepository implements TeamsRepositoryContract
{

    protected $model;

    public function __construct(Team $team)
    {
        $this->model = $team;
    }

    public function updateOrCreate(array $params)
    {
        $this->model->updateOrCreate(
            ['id' => $params['id']],
            [
                'conference' => $params['conference'],
                'division' => $params['division'],
                'city' => $params['city'],
                'name' => $params['name'],
                'full_name' => $params['full_name'],
                'abbreviation' => $params['abbreviation']
            ]
        );
    }
}
