<?php

namespace App\Providers;

use App\Lib\Crawler;
use App\Lib\CrawlerInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(CrawlerInterface::class, Crawler::class);
    }
}
