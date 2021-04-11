<?php

namespace Tests\Browser;

use App\Models\Cinema;
use App\Models\CinemaMovie;
use App\Models\CinemaShow;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CinemaReservationTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @test
     * @group cinema
     * @group cinema_reservation
     */
    public function testCreateCinemaReservation()
    {
        $cinema = Cinema::create([
            'name' => 'Vue',
            'location' => 'Eindhoven',
        ]);

        $cinema->halls()->create(['chair_rows' => 21, 'chair_row_seats' => 21 ]);

        $hall = $cinema->halls()->first();

        $movie = CinemaMovie::create(['title' => 'toy story']);

        $show = new CinemaShow(
            [
                'movie_id' => $movie->id,
                'start_datetime' => now()->addDays(13)->setTime(14, 30)->format('Y-m-d\TH:i'),
                'end_datetime' => now()->addDays(13)->setTime(14, 50)->format('Y-m-d\TH:i'),
            ]);

        $hall->shows()->save($show);

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visit(route('reservation.cinema'))
                ->select('cinema', '1')
                ->pause(1000)
                ->select('movie', '1')
                ->pause(1000)
                ->type('persons', '3')
                ->pause(1000)
                ->press('Stoelen kiezen')
                ->pause(1000)
                ->assertSee('Selecteer uw stoelen')
                ->click('td[id="1-1"]')
                ->pause(1000)
                ->press('Stoelen kiezen')
                ->pause(1000)
                ->assertSee('Reservering succesvol voor de film')
                ->pause(10000);
        });
    }


}
