<?php

namespace App\Http\Controllers;

use App\Services\Players\Contracts\PlayerServiceContract;

class PlayersController extends Controller
{
    private $playerService;

    public function __construct(PlayerServiceContract $playerService)
    {
        $this->playerService = $playerService;    
    }
    public function __invoke()
    {
        return $this->playerService->all();
    }
}
