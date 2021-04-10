<?php

namespace Tests\Browser;

use App\Models\Cinema;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CinemaCreateTest extends DuskTestCase
{
    public function testLogin()
    {
        $user = User::factory()->create([
            'email' => 'admin@test.nl',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'password')
                ->press('LOG IN')
                ->assertPathIs('/dashboard');
        });
    }


    public function testCinemaIndex()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('cinemas.index'))
                    ->assertSee('Bioscopen');
        });
    }

    public function testCreateCinema()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('cinemas.index'))
                ->click('#createCinema')
                ->assertPathIs('/cinemas/create')
                ->waitFor('#InputCinemaName')
                ->type('#InputCinemaName', 'bioscoop')
                ->type('#InputCinemaLocation', 'eindhoven')
                ->press('Submit')
                ->assertSee('Bioscoop succesvol toegevoegd')
                ->assertPathIs('/cinemas');

        });

    }


    public function testEditCinema()
    {

        $cinema = Cinema::inRandomOrder()->first();
        $this->browse(function (Browser $browser) use ($cinema) {
            $browser->visit(route('cinemas.edit', $cinema->id))
                ->assertPathIs('/cinemas/'.$cinema->id.'/edit')
                ->waitFor('#InputCinemaName')
                ->type('#InputCinemaName', 'bioscoop')
                ->type('#InputCinemaLocation', 'veldhoven')
                ->press('Opslaan')
                ->assertSee('Bioscoop succesvol aangepast')
                ->assertPathIs('/cinemas');

        });

    }
}
