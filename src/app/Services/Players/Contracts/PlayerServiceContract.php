<?php

namespace App\Services\Players\Contracts;

interface PlayerServiceContract
{
    /**
     * @return array
     */
    public function all(): array;

    /**
     * @param  array  $params
     */
    public function store(array $params);

    public function update(array $player, int $id);

    /**
     * @param  array  $params
     */
    public function storeBatch(array $players);

    public function delete(int $id);
}
