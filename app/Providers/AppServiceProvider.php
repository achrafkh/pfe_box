<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repo\facebook\IFacebookRepository', 'App\Repo\facebook\FacebookRepo');
        $this->app->bind('App\Repo\Calendar\ICalendarRepository', 'App\Repo\Calendar\CalendarRepo');

        if ($this->app->environment() == 'localpc') {
            $this->app->register('Appzcoder\CrudGenerator\CrudGeneratorServiceProvider');
        }
    }
}
