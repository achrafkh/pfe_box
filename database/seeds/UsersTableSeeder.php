<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create([
            'login' => 'operateur',
            'role'  => 'op',
        ]);

        factory(App\User::class)->create([
            'login' => 'commercial',
            'role'  => 'com',
        ]);

        factory(App\User::class)->create([
            'login' => 'marketer',
            'role'  => 'mark',
        ]);
    }
}
