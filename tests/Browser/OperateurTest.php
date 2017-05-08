<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use App\Client;

class OperateurTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = User::findorfail(1);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/')
                    ->type('username', $user->username)
                    ->type('password', '010203')
                    ->press('login')
                    ->press('adduser')
                    ->type('firstname' ,'TESTCASEname')
                    ->type('lastname' ,'TESTCASRlast')
                    ->click('#newClient > div > a.wizard-next')

                    ->type('email' ,'testcaqsdqdse@osqdqdne.com')
                    ->type('phone' ,'875464932128')
                    ->click('#newClient > div > a.wizard-next')


                    ->type('address' ,'Rue 118 charles degaule')
                    ->select('city')
                    ->type('birthdate' ,'2016/12/06')
                    ->click('#newClient > div > a.wizard-finish')

                    ->waitForText('Client Added Successfuly')
                    ->assertSee('Client Added Successfuly');
        });

        Client::where('phone','875464932128')->delete();
    }
}
