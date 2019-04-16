<?php

namespace Modules\User\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\User\Contracts\UserRepositoryContract;
use Modules\User\Contracts\UserServiceContract;
use Modules\User\Repositories\UserRepository;
use Modules\User\Services\UserService;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            UserServiceContract::class,
            UserService::class
        );

        $this->app->bind(
            UserRepositoryContract::class,
            UserRepository::class
        );
    }
}
