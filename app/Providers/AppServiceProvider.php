<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Repo\facebook\FacebookRepo;
use Laravel\Dusk\DuskServiceProvider;
use Countries;
use App\Access;
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

         $this->app->bind('App\Repo\facebook\FacebookRepo', function () {
                $access = Access::first();
                
                if(!$access)
                {
                     return new FacebookRepo('','');
                }
                return new FacebookRepo($access->app_secret, $access->app_id);

            });

        if ($this->app->environment() == 'localpc') {
            $this->app->register('Appzcoder\CrudGenerator\CrudGeneratorServiceProvider');
            }
        if ($this->app->environment('local', 'testing')) {
            $this->app->register(DuskServiceProvider::class);
        }
    }
}
