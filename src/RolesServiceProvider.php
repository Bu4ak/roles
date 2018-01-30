<?php

namespace Bu4ak\Roles;

use Bu4ak\Roles\Middleware\Admin;
use Bu4ak\Roles\Middleware\Manager;
use Bu4ak\Roles\Middleware\User;
use Illuminate\Support\ServiceProvider;

/**
 * Class RolesServiceProvider.
 */
class RolesServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    //    protected $defer = true;

    public function boot()
    {
        $this->app['router']->aliasMiddleware('admin', Admin::class);
        $this->app['router']->aliasMiddleware('manager', Manager::class);
        $this->app['router']->aliasMiddleware('user', User::class);

        $this->publishes(
            [
                __DIR__.'/database/migrations/' => database_path('/migrations'),
            ],
            'migrations'
        );
    }

    public function register()
    {
    }
}
