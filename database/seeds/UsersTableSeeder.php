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
        factory(App\Role::class)->create(['title'=>'op'])->each(function ($u) {
            $u->users()->save(factory(App\User::class)->make(['username' => 'operateur']));
        });


        factory(App\Role::class)->create(['title'=>'com'])->each(function ($u) {
            $u->users()->save(factory(App\User::class)->make(['username' => 'commercial']));
        });

        factory(App\Role::class)->create(['title'=>'mark'])->each(function ($u) {
            $u->users()->save(factory(App\User::class)->make(['username' => 'marketeur']));
        });
                
        factory(App\Role::class)->create(['title'=>'admin'])->each(function ($u) {
            $u->users()->save(factory(App\User::class)->make(['username' => 'superadmin']));
        });
    }
}
