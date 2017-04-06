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
            'fulltitle' => 'CallCenter',
        ]);

        $op->users()->save(factory(App\User::class)->make(['username' => 'operateur','showroom_id'=> null]));


        $com = factory(App\Role::class)->create([
            'title'=>'com',
            'fulltitle' => 'Agent',
        ]);

        $com->users()->save(factory(App\User::class)->make(['username' => 'commercial','showroom_id'=> 2]));


        $mark = factory(App\Role::class)->create([
            'title'=>'mark',
            'fulltitle' => 'Analyzer',
        ]);

        $mark->users()->save(factory(App\User::class)->make(['username' => 'marketeur','showroom_id'=> null]));


        $superadmin = factory(App\Role::class)->create([
            'title'=>'admin',
            'fulltitle' => 'Administrator',
        ]);

        $superadmin->users()->save(factory(App\User::class)->make(['username' => 'superadmin','showroom_id'=> null]));
    }
}
