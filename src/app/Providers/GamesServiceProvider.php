<?php

namespace App\Providers;

use App\Services\Games\Contracts\GamesServiceContract;
use App\Services\Games\GamesService;
use Illuminate\Support\ServiceProvider;

class GamesServiceProvider extends ServiceProvider
{
    protected $defer = true;
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            GamesServiceContract::class,
            GamesService:: class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function provides()
    {
        return [
            GamesServiceContract::class
        ];
    }
}
