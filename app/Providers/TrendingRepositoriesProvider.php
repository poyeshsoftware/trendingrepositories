<?php

namespace App\Providers;

use App\Http\Services\TrendingRepositoriesInterface;
use App\Http\Services\TrendingRepositoriesService;
use Illuminate\Support\ServiceProvider;

class TrendingRepositoriesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(TrendingRepositoriesInterface::class,TrendingRepositoriesService::class);
    }
}
