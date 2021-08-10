<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\Post\PostRepositoryInterface::class,
            \App\Repositories\Post\PostRepository::class
        );
        if(env('REDIRECT_HTTPS')) {
            $this->app['request']->server->set('HTTPS', true);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    { 
        if(env('REDIRECT_HTTPS')) {
            $url->formatScheme('https');
        }
        Paginator::useBootstrap();
    }
}
