<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Repositories\StoreListingRepositoryInterface::class,
            \App\Repositories\StoreListingRepository::class
        );
        
        $this->app->bind(
            \App\Services\StoreListingService::class,
            function ($app) {
                return new \App\Services\StoreListingService(
                    $app->make(\App\Services\FileStorageService::class),
                    $app->make(\App\Repositories\StoreListingRepositoryInterface::class)
                );
            }
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
