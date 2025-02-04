<?php

namespace App\Console\Commands;

use App\Jobs\ImportGamesJob;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class CreateGames extends Command
{
    const CURSOR = 1;

    const PER_PAGE = 50;

    const DELAY = 30;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-games';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lista todos os games da API balldontlie e envia para job';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $page = self::CURSOR;
        $perPage = self::PER_PAGE;

        do {
            $this->info($page, $perPage);
            $response = $this->getGames($page, $perPage);
            
            if($response && isset($response['data'])) {
               
                $this->info("Página {$page} processada com sucesso.");

                $games = $response['data'];

                ImportGamesJob::dispatch($games);

                $page++;
                sleep(self::DELAY);
            } else {
                break;
            }
        } while ($response && $response['meta']['next_cursor'] !== null);

        $this->info('todos os games foram processados.');
    }

    private function getGames($page, $perPage)
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => env('BALLDONTLIE_AUTHORIZATION_KEY')
            ])->get(env('BALLDONTLIE_API') . 'games?cursor='.$page.'&per_page='.$perPage);

            return $response->json();
        } catch (Exception $e) {
            return null;
        }
    }
}
