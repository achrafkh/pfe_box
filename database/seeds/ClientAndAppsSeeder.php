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
        factory(App\Client::class, 100)->create();
        factory(App\Appointment::class, 100)->create();
    }
}
