<?php

use Illuminate\Database\Seeder;

class InvoicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        factory(App\Invoice::class, 100)->create()->each(function ($u) use ($faker) {
            $number = $faker->numberBetween(1, 5);
            $u->items()->saveMany(factory(App\InvoiceLine::class, $number)->make());
        });
    }
}
