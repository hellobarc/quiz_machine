<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\LevelRepositoryInterface;
use App\Repositories\LevelRepository;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            LevelRepositoryInterface::class, 
            LevelRepository::class
            );

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
