<?php

namespace App\Providers;

use App\Repositories\Games\Contracts\GamesRepositoryContract;
use App\Repositories\Games\GamesRepository;
use Illuminate\Support\ServiceProvider;

class GamesRepositoryProvider extends ServiceProvider
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
            GamesRepositoryContract::class,
            GamesRepository:: class
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
            GamesRepositoryContract::class
        ];
    }
}
