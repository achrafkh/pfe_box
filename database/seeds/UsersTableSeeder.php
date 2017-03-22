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
        $op = factory(App\Role::class)->create([
            'title'=>'op',
        ]);

        $op->users()->save(factory(App\User::class)->make(['username' => 'operateur']));


        $com = factory(App\Role::class)->create([
            'title'=>'com',
        ]);

        $com->users()->save(factory(App\User::class)->make(['username' => 'commercial']));


        $mark = factory(App\Role::class)->create([
            'title'=>'mark',
        ]);

        $mark->users()->save(factory(App\User::class)->make(['username' => 'marketeur']));


        $superadmin = factory(App\Role::class)->create([
            'title'=>'admin',
        ]);

        $superadmin->users()->save(factory(App\User::class)->make(['username' => 'superadmin']));
    }
}
