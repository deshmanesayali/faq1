<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;


class SuccessfulLoginTest extends DuskTestCase
{
    //use DatabaseMigrations;
    //use RefreshDatabase;

    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testSuccessfulLogin()


    {
        $user = factory(User::class)->make();
        $user->save();
        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'secret')
                ->press('Login')
                ->assertPathIs('/home')
                ->assertSee('Home');

        });


    }

    public function  testToAddAQuestion()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/home')
                ->assertSee('Questions')
                ->clickLink('There are no questions to view, create a question.')
                ->assertSee('Create Question')
                ->type('body','whats your name?')
                ->press('Save')
                ->assertPathIs('/home')
                ->assertSee('IT WORKS!');
        });



    }


    public function  testToCheckViewButton()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/questions/1')
                ->assertSee('Home')
                ->assertSee('whats your name?');


        });

    }

    public function testEditAQuestion()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/questions/1/edit')
                ->assertSee('Create Question')
                ->type('body','can you tell me your name?')
                ->press('Save')
                ->assertPathIs('/questions/1')
                ->assertSee('Saved');
        });
    }


    public function testToAnswerAQuestion()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/questions/1')

                ->assertSee('No Answers')
            ->clickLink('Answer Question')
            ->assertPathIs('/questions/1/answers/create')
            ->assertSee('Create Answer')
            ->type('body','Sayali')
            ->press('Save')
            ->assertPathIs('/questions/1');


        });
    }

    public function testToViewAnswer()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/questions/1')

                ->assertSee('Sayali')
                ->clickLink('View')
                ->assertPathIs('/questions/1/answers/1');


        });
    }

    public function testToEditAnAnswer()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/questions/1/answers/1')

                ->assertSee('Sayali')
                ->clickLink('Edit Answer')
                ->assertPathIs('/questions/1/answers/1/edit')
                ->assertSee('Create Answer')
                ->type('body','Sayali Deshmane')
                ->press('Save')
                ->assertPathIs('/questions/1/answers/1')
                ->assertSee('Updated');


        });
    }


    public function testToDeleteAnAnswer()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/questions/1/answers/1')

                ->assertSee('Sayali Deshmane')
                ->press('Delete')
                ->assertPathIs('/questions/1')
                ->assertSee('No Answer');



        });
    }


    public function testToDeleteAQuestion()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/questions/1')

                ->assertSee('can you tell me your name?')
                ->press('Delete')
                ->assertPathIs('/home')
                ->assertSee('Deleted');



        });
    }


    public function testSuccessfulLogout()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/home')

                ->assertSee('My Account')
                ->click('#navbarDropdown')
                ->clickLink('Logout')
                ->assertPathIs('/')
                ->assertSee('Laravel');

    });
    }

    public function testSuccessfulRegister()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000/')

                ->assertSee('Laravel')
                ->clickLink('Register')
                ->assertPathIs('/register')
                ->assertSee('Register')
                ->type('email','rafaelnadal@gmail.com')
                ->type('password','sayali')
                ->type('password_confirmation','sayali')
                ->press('Register')
                ->assertPathIs('/home')
                 ->assertSee('Home')
                 ->assertSee('My Account')
                ->click('#navbarDropdown')
                ->clickLink('Create Profile')
                ->assertPathIs('/user/2/profile')
                ->assertSee('My Profile')
                ->type('fname','Rafael')
                ->type('lname','Nadal')
                ->type('body','I am a professional tennis player.')
                ->press('Save')
                ->assertPathIs('/home')
                ->assertSee('Profile Created')
                ->assertSee('My Account')
                ->click('#navbarDropdown')
                ->clickLink('My Profile')
                ->assertPathIs('/user/2/profile/1')
                ->assertSee('My Profile')
                ->clickLink('Edit')
                ->assertPathIs('/user/2/profile/1/edit')
                ->assertSee('My Profile')
                ->type('body','I am world number one!')
                ->press('Save')
                ->assertPathIs('/home')
                ->assertSee('Updated Profile');



        });
    }

   
}


