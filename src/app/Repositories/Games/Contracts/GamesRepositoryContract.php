<?php

namespace App\Repositories\Games\Contracts;

use App\Repositories\BaseRepositoryContract;

interface GamesRepositoryContract extends BaseRepositoryContract
{
    public function updateOrCreate(array $games);
}