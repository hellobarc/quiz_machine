<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\LevelRepositoryInterface;
use App\Repositories\LevelRepository;
use App\Interfaces\CategoryRepositoryInterface;
use App\Repositories\CategoryRepository;
use App\Interfaces\ExamRepositoryInterface;
use App\Repositories\ExamRepository;
use App\Interfaces\QuizRepositoryInterface;
use App\Repositories\QuizRepository;


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
        $this->app->bind(
            CategoryRepositoryInterface::class, 
            CategoryRepository::class
            );
        $this->app->bind(
            ExamRepositoryInterface::class, 
            ExamRepository::class
            );
        $this->app->bind(
            QuizRepositoryInterface::class, 
            QuizRepository::class
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
