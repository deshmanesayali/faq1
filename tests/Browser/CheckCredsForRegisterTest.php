<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CheckCredsForRegisterTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCheckCredsForRegister()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->assertSee('Register')
                ->type('email', 'sayali1995@gmail.com')
                ->type('password', 'sayali')
                ->type('password_confirmation', 'sayali')
                ->press('Register')
                ->assertPathIs('/home');

        });
    }
}
