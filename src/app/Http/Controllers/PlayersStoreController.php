<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlayerStoreRequest;
use App\Services\Players\Contracts\PlayerServiceContract;
use Exception;
use App\Models\User;

class PlayersStoreController extends Controller
{
    private $playerService;

    public function __construct(PlayerServiceContract $playerService)
    {
        $this->playerService = $playerService;    
    }

    public function __invoke(PlayerStoreRequest $request, User $user)
    {
        try {
            $this->playerService->store($request->all());

            return response()->json(['message' => 'Registro criado com sucesso'], 200);
        } catch (Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 400);
        }
    }
}
