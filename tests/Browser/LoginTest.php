<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;



class LoginTest extends DuskTestCase
{

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testLoginCaseAsOp()
    {
        $user = User::findorfail(1);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/')
                    ->assertSee('Ego vero sic intellego')
                    ->type('username', $user->username)
                    ->type('password', '010203')
                    ->press('login')
                    ->assertPathIs('/op/dashboard') 
                    ->visit('/logout')
                    ->assertGuest();
        });
    }

    public function testLoginCaseAsCom()
    {
        $user = User::findorfail(2);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/')
                    ->assertSee('Ego vero sic intellego')
                    ->type('username', $user->username)
                    ->type('password', '010203')
                    ->press('login')
                    ->assertPathIs('/com/appointments')
                    ->visit('/logout')
                    ->assertGuest();
        });
    }
    public function testLoginCaseAsMark()
    {
        $user = User::findorfail(3);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/')
                    ->assertSee('Ego vero sic intellego')
                    ->type('username', $user->username)
                    ->type('password', '010203')
                    ->press('login')
                    ->assertPathIs('/mark/dashboard')
                    ->visit('/logout')
                    ->assertGuest();
        });
    }
    public function testLoginCaseAsAdmin()
    {
        $user = User::findorfail(4);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/')
                    ->assertSee('Ego vero sic intellego')
                    ->type('username', $user->username)
                    ->type('password', '010203')
                    ->press('login')
                    ->assertPathIs('/admin/appointments')
                    ->visit('/logout')
                    ->assertGuest();
        });
    }
}
