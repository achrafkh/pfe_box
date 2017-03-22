<?php

use Illuminate\Database\Seeder;

class ClientAndAppsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Showroom::class, 10)->create();
        factory(App\Client::class, 60)->create();
        factory(App\Appointment::class, 500)->create();
    }
}
