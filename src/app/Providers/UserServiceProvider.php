<?php

namespace App\Providers;

use App\Services\Users\Contracts\UserServiceContract;
use App\Services\Users\UserService;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
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
            UserServiceContract::class,
            UserService:: class
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
            UserServiceContract::class
        ];
    }
}
