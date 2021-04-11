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

    /**
     * @test
     * @group cinema
     */
    public function testVistHallIndex()
    {
        Cinema::create([
            'name' => 'Vue',
            'location' => 'Eindhoven',
        ]);
        $cinema = Cinema::inRandomOrder()->first();
        $this->browse(function (Browser $browser) use ($cinema) {
            $browser->loginAs(User::find(1))
            ->visit(route('admin.cinemas.halls.index', $cinema->id))
                ->assertPathIs('/admin/cinemas/'.$cinema->id.'/halls')
                ->assertSee('Bioscopen');

        });

    }

    /**
     * @test
     * @group cinema
     */
    public function testCreateHall()
    {
        $cinema = Cinema::create([
            'name' => 'Vue',
            'location' => 'Eindhoven',
        ]);
        $this->browse(function (Browser $browser) use ($cinema) {
            $browser->loginAs(User::find(1))
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

    /**
     * @test
     * @group cinema
     */
    public function testCreateHallFail()
    {
        $cinema = Cinema::create([
            'name' => 'Vue',
            'location' => 'Eindhoven',
        ]);

        $this->browse(function (Browser $browser) use ($cinema) {
            $browser->loginAs(User::find(1))
                ->visit(route('admin.cinemas.halls.create', $cinema->id))
                ->assertPathIs('/admin/cinemas/'.$cinema->id.'/halls/create')
                ->assertSee('Bioscoop zaal toevoegen')
                ->type('#InputCinemaHallRows', '22')
                ->type('#InputCinemaHallRowSeats', '24')
                ->press('Opslaan')
                ->assertPathIs('/admin/cinemas/'.$cinema->id.'/halls/create')
            ;

        });

    }
}
