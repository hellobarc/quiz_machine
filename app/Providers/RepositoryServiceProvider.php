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
use App\Interfaces\MockRepositoryInterface;
use App\Repositories\MockRepository;
use App\Interfaces\MockQuestionRepositoryInterface;
use App\Repositories\MockQuestionRepository;


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
        $this->app->bind(
            MockRepositoryInterface::class, 
            MockRepository::class
            );
        $this->app->bind(
            MockQuestionRepositoryInterface::class, 
            MockQuestionRepository::class
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
