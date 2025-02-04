<?php

namespace App\Jobs;

use App\Services\Teams\Contracts\TeamsServiceContract;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class ImportTeamsJob implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected array $team;

    /**
     * 
     */
    public function __construct(array $team)
    {
        $this->team = $team;
    }

    /**
     * Execute the job.
     */
    public function handle(TeamsServiceContract $teamService)
    {
        try {
           $teamService->store($this->team);
        } catch (Exception $exception) {
            throw $exception;
        }
       
    }
}
