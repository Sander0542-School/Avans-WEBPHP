<?php

namespace Tests\Browser;

use App\Models\Cinema;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CinemaHallCreateTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testVistHallIndex()
    {
        $cinema = Cinema::inRandomOrder()->first();
        $this->browse(function (Browser $browser) use ($cinema) {
            $browser->loginAs(User::find(1))
            ->visit(route('admin.cinemas.halls.index', $cinema->id))
                ->assertPathIs('/admin/cinemas/'.$cinema->id.'/halls')
                ->assertSee('Bioscopen');

        });

    }

    public function testCreateHall()
    {
        $cinema = Cinema::inRandomOrder()->first();
        $this->browse(function (Browser $browser) use ($cinema) {
            $browser
                ->visit(route('admin.cinemas.halls.create', $cinema->id))
                ->assertPathIs('/admin/cinemas/'.$cinema->id.'/halls/create')
                ->assertSee('Bioscoop zaal toevoegen')
                ->type('#InputCinemaHallRows', '20')
                ->type('#InputCinemaHallRowSeats', '24')
                ->press('Opslaan')
                ->assertSee('Zaal succesvol toegevoegd')
            ;

        });

    }


    public function testCreateHallFail()
    {
        $cinema = Cinema::inRandomOrder()->first();
        $this->browse(function (Browser $browser) use ($cinema) {
            $browser
                ->visit(route('admin.cinemas.halls.create', $cinema->id))
                ->assertPathIs('/admin/cinemas/'.$cinema->id.'/halls/create')
                ->assertSee('Bioscoop zaal toevoegen')
                ->type('#InputCinemaHallRows', '22')
                ->type('#InputCinemaHallRowSeats', '24')
                ->press('Opslaan')
                ->assertSee('The chair rows may not be greater than 20.')
            ;

        });

    }
}
