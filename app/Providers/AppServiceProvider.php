<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

use App\Repositories\BiotimeRepository;
use App\Services\BiotimeService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

     $this->app->bind(BiotimeRepository::class,function($app){ return new BiotimeRepository(); });

     $this->app->bind(BiotimeService::class, function ($app) { return new BiotimeService($app->make(BiotimeRepository::class)); });

   
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Paginator::useBootstrap();
    }
}
