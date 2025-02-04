<?php

namespace App\Jobs;

use App\Services\Games\Contracts\GamesServiceContract;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\SerializesModels;

class ImportGamesJob implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected array $games;

    /**
     * 
     */
    public function __construct(array $games)
    {
        $this->games = $games;
    }

    /**
     * Execute the job.
     */
    public function handle(GamesServiceContract $gameService)
    {
        try {
            $gameService->storeBatch($this->games);
        } catch (Exception $exception) {
            throw $exception;
        }
       
    }
}
