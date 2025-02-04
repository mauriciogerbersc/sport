<?php

namespace App\Repositories\Teams\Contracts;

use App\Repositories\BaseRepositoryContract;

interface TeamsRepositoryContract extends BaseRepositoryContract
{
    public function updateOrCreate(array $params);
}