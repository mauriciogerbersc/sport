<?php

namespace App\Providers;

use App\Repositories\Players\Contracts\PlayerRepositoryContract;
use App\Repositories\Players\PlayerRepository;
use Illuminate\Support\ServiceProvider;

class PlayerRepositoryProvider extends ServiceProvider
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
            PlayerRepositoryContract::class,
            PlayerRepository:: class
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
            PlayerRepositoryContract::class
        ];
    }
}
