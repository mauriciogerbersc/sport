<?php

namespace App\Providers;

use App\Services\Players\Contracts\PlayerServiceContract;
use App\Services\Players\PlayerService;
use Illuminate\Support\ServiceProvider;

class PlayerServiceProvider extends ServiceProvider
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
            PlayerServiceContract::class,
            PlayerService:: class
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
            PlayerServiceContract::class
        ];
    }
}
