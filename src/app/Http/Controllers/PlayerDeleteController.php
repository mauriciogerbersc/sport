<?php

namespace App\Http\Controllers;

use App\Services\Players\Contracts\PlayerServiceContract;
use Exception;

class PlayerDeleteController extends Controller
{
    private $playerService;

    public function __construct(PlayerServiceContract $playerService)
    {
        $this->playerService = $playerService;    
    }

    public function __invoke(int $id)
    {
        try {
            $this->playerService->delete($id);

            return response()->json(['message' => 'Registro removido com sucesso'], 200);
        } catch (Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 400);
        }
    }
}
