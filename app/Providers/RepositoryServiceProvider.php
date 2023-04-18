<?php

namespace App\Providers;

use App\Repositories\Implementation\StudentRepositoryImpl;
use App\Repositories\StudentRepository;
use App\Services\Implementation\StudentServiceImpl;
use App\Services\StudentService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(StudentRepository::class, StudentRepositoryImpl::class);
        $this->app->bind(StudentService::class, StudentServiceImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
