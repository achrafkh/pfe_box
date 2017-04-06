<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Countries;

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
        $cities = Countries::where('name.common', 'Tunisia')->first()->states->pluck('name', 'postal');
        view()->share('cities', $cities);
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
        $this->app->bind('App\Repo\Charts\IChartsRepository', 'App\Repo\Charts\ChartsRepo');

        if ($this->app->environment() == 'localpc') {
            $this->app->register('Appzcoder\CrudGenerator\CrudGeneratorServiceProvider');
        }
    }
}
