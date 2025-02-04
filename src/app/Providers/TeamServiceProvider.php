<?php

namespace App\Providers;

use App\Services\Teams\Contracts\TeamsServiceContract;
use App\Services\Teams\TeamsService;
use Illuminate\Support\ServiceProvider;

class TeamServiceProvider extends ServiceProvider
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
            TeamsServiceContract::class,
            TeamsService:: class
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
            TeamsServiceContract::class
        ];
    }
}
