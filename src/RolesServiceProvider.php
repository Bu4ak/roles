<?php

namespace Bu4ak\Roles;

use Bu4ak\Roles\Middleware\IsAdmin;
use Bu4ak\Roles\Middleware\IsManager;
use Bu4ak\Roles\Middleware\IsUser;
use Illuminate\Support\ServiceProvider;

/**
 * Class RolesServiceProvider.
 */
class RolesServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app['router']->aliasMiddleware('admin', IsAdmin::class);
        $this->app['router']->aliasMiddleware('manager', IsManager::class);
        $this->app['router']->aliasMiddleware('user', IsUser::class);

        $this->publishes(
            [
                __DIR__ . '/database/migrations/' => database_path('/migrations'),
            ],
            'migrations'
        );
    }

    public function register()
    {
    }
}
