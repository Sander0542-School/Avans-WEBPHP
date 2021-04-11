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

    /**
     * @test
     * @group cinema
     */
    public function testCinemaIndex()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visit(route('admin.cinemas.index'))
                    ->assertSee('Bioscopen');
        });
    }

    /**
     * @test
     * @group cinema
     */
    public function testCreateCinema()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visit(route('admin.cinemas.index'))
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

    /**
     * @test
     * @group cinema
     */
    public function testEditCinema()
    {
        $cinema =Cinema::create([
            'name' => 'Vue',
            'location' => 'Eindhoven',
        ]);

        $this->browse(function (Browser $browser) use ($cinema) {
            $browser->loginAs(User::find(1))
            ->visit(route('admin.cinemas.edit', $cinema->id))
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
