<?php

namespace App\Console\Commands;

use App\Jobs\ImportTeamsJob;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class CreateTeams extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-teams';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => env('BALLDONTLIE_AUTHORIZATION_KEY')
            ])->get(env('BALLDONTLIE_API') . 'teams');

            if ($response->successful()) {
                $data = $response->json();
                $teams = $data['data'];
            
                foreach ($teams as $team) {
                    ImportTeamsJob::dispatch($team);

                    $this->info("Importando {$team['full_name']} processada com sucesso.");
                }
            } else {
                $this->error("Error ao processar requisição");
                return;
            }
           
            $this->info('todos os times foram processados.');
        } catch (Exception $exception) {
            throw $exception;
        }
    }
}
