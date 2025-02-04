<?php

namespace App\Console\Commands;

use App\Jobs\ImportPlayerJob;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class CreatePlayers extends Command
{
    const CURSOR = 1;

    const PER_PAGE = 50;

    const DELAY = 30;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-players';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lista todos os players da API balldontlie e envia para job';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $page = self::CURSOR;
        $perPage = self::PER_PAGE;

        do {
            $this->info($page, $perPage);
            $response = $this->getPlayers($page, $perPage);
            
            if($response && isset($response['data'])) {
               
                $this->info("Página {$page} processada com sucesso.");

                $players = $response['data'];
                ImportPlayerJob::dispatch($players);

                $page++;
                sleep(self::DELAY);
            } else {
                break;
            }
        } while ($response && $response['meta']['next_cursor'] !== null);

        $this->info('todos os players foram processados.');
    }

    private function getPlayers($page, $perPage)
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => env('BALLDONTLIE_AUTHORIZATION_KEY')
            ])->get(env('BALLDONTLIE_API') . 'players?cursor='.$page.'&per_page='.$perPage);

            return $response->json();
        } catch (Exception $e) {
            return null;
        }
    }
}
