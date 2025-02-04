<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlayerUpdateRequest;
use App\Services\Players\Contracts\PlayerServiceContract;
use Exception;

class PlayersUpdateController extends Controller
{
    private $playerService;

    public function __construct(PlayerServiceContract $playerService)
    {
        $this->playerService = $playerService;    
    }

    public function __invoke(PlayerUpdateRequest $request, int $id)
    {
        try {
            $this->playerService->update($request->all(), $id);

            return response()->json(['message' => 'Registro atualizado com sucesso'], 201);
        } catch (Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 400);
        }
    }
}
