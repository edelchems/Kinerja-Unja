<?php

namespace Edel\KinerjaUnja;

use Illuminate\Support\ServiceProvider;

class KinerjaUnjaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Edel\KinerjaUnja\Kinerja');
        $this->app->make('Edel\KinerjaUnja\UrlKinerja');
        
    }
}
