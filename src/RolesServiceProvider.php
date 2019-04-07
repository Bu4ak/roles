<?php

namespace Bu4ak\Roles;

use Bu4ak\Roles\Middleware\IsAdmin;
use Bu4ak\Roles\Middleware\IsManager;
use Bu4ak\Roles\Middleware\IsUser;
use Illuminate\Support\ServiceProvider;
use Bu4ak\Roles\Enums\MiddlewareType;

/**
 * Class RolesServiceProvider.
 */
class RolesServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app['router']->aliasMiddleware(MiddlewareType::ADMIN, IsAdmin::class);
        $this->app['router']->aliasMiddleware(MiddlewareType::MANAGER, IsManager::class);
        $this->app['router']->aliasMiddleware(MiddlewareType::USER, IsUser::class);

        $this->publishes(
            [
                __DIR__ . '/database/migrations/' => database_path('/migrations'),
            ],
            'migrations'
        );
    }

    public function register()
    { }
}
