<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Mail\ClientReminder;
use App\Appointment;
use Carbon\Carbon;
use App\Client;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $app = Appointment::where('end_at', '<', Carbon::now())->where('status', 'pending')->get();
            $app->each->update(['status' => 'rescheduled']);
        })->Daily();

        $schedule->call(function () {
            $date = Carbon::now()->addDay();
            $apps = Appointment::whereMonth('start_at','=',$date->month)->whereDay('start_at','=',$date->day)->with('client','showroom')->get();
            foreach($apps as $appointment)
            {
                Mail::to($appointment->client)->queue(new ClientReminder($appointment));
            }  
        })->dailyAt('18:00');
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
