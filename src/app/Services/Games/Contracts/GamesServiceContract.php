<?php

namespace App\Services\Games\Contracts;

interface GamesServiceContract
{
    /**
     * @param  array  $params
     */
    public function storeBatch(array $games);
}
