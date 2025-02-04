<?php

namespace App\Jobs;

use App\Services\Players\Contracts\PlayerServiceContract;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\SerializesModels;

class ImportPlayerJob implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected array $player;

    /**
     * 
     */
    public function __construct(array $player)
    {
        $this->player = $player;
    }

    /**
     * Execute the job.
     */
    public function handle(PlayerServiceContract $playerService)
    {
        try {
            $playerService->storeBatch($this->player);
        } catch (Exception $exception) {
            throw $exception;
        }
       
    }
}
