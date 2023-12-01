<?php

namespace App\Providers;

use App\Repositories\Eloquent\ProcessRepository;
use App\Repositories\Interfaces\ProcessInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ProcessInterface::class, ProcessRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
