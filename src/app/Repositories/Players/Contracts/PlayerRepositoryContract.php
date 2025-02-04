<?php

namespace App\Repositories\Players\Contracts;

use App\Repositories\BaseRepositoryContract;

interface PlayerRepositoryContract extends BaseRepositoryContract
{
    public function updateOrCreate(array $player);
}