<?php

namespace App\Providers;

use App\Repositories\Teams\Contracts\TeamsRepositoryContract;
use App\Repositories\Teams\TeamsRepository;
use Illuminate\Support\ServiceProvider;

class TeamRepositoryProvider extends ServiceProvider
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
            TeamsRepositoryContract::class,
            TeamsRepository:: class
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
            TeamsRepositoryContract::class
        ];
    }
}
