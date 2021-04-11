<?php

namespace Tests\Browser;

use App\Models\Cinema;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CinemaCreateTest extends DuskTestCase
{

    use DatabaseMigrations;

    public function testLogin()
    {
       $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@test.nl',
            'password' => \Hash::make('password'),
            'country' => 'Nederland',
            'state' => 'Noord Brabant',
            'city' => 'Eindhoven',
            'zip_code' => '1234 AB',
            'street' => 'Weglaan',
            'building_number' => '12',
            'is_admin' => true,
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
            $browser->visit(route('admin.cinemas.index'))
                    ->assertSee('Bioscopen');
        });
    }

    public function testCreateCinema()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('admin.cinemas.index'))
                ->click('#createCinema')
                ->assertPathIs('/admin/cinemas/create')
                ->waitFor('#InputCinemaName')
                ->type('#InputCinemaName', 'bioscoop')
                ->type('#InputCinemaLocation', 'eindhoven')
                ->press('Submit')
                ->assertSee('Bioscoop succesvol toegevoegd')
                ->assertPathIs('/admin/cinemas');

        });

    }


    public function testEditCinema()
    {

        $cinema = Cinema::inRandomOrder()->first();
        $this->browse(function (Browser $browser) use ($cinema) {
            $browser->visit(route('admin.cinemas.edit', $cinema->id))
                ->assertPathIs('/admin/cinemas/'.$cinema->id.'/edit')
                ->waitFor('#InputCinemaName')
                ->type('#InputCinemaName', 'bioscoop')
                ->type('#InputCinemaLocation', 'veldhoven')
                ->press('Opslaan')
                ->assertSee('Bioscoop succesvol aangepast')
                ->assertPathIs('/admin/cinemas');

        });

    }
}
