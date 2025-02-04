<?php

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Gate::define('list-record', fn ($user) => $user->isAdmin() || $user->isUser());
        Gate::define('create-record', fn ($user) => $user->isAdmin() || $user->isUser());
        Gate::define('update-record', fn ($user) => $user->isAdmin() || $user->isUser());
        Gate::define('delete-record', fn ($user) => $user->isAdmin());
    }
}