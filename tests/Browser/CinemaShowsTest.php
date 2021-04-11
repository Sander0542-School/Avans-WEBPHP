<?php

namespace Tests\Browser;

use App\Models\Cinema;
use App\Models\CinemaMovie;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CinemaShowsTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @test
     * @group cinema
     */
    public function testCreateMovie()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visit(route('admin.movies.create'))
                ->type('#InputMovieName', 'Toy story')
                ->press('Submit')
                ->pause(1000)
                ->assertSee('Film succesvol toegevoegd');
        });
    }

    /**
     * @test
     * @group cinema
     */
    public function testCreateShow()
    {
        $cinema = Cinema::create([
            'name' => 'Vue',
            'location' => 'Eindhoven',
        ]);

        $cinema->halls()->create(['chair_rows' => 21, 'chair_row_seats' => 21 ]);
        $movie = CinemaMovie::create(['title' => 'toy story']);

        $this->browse(function (Browser $browser) use ($cinema, $movie) {
            $browser->loginAs(User::find(1))
                ->visit(route('admin.halls.shows.create', $cinema->halls->first()->id))
                ->select('movie_id', '1')
                ->value('input[name="start_datetime"]', now()->addDays(13)->setTime(14, 30)->format('Y-m-d\TH:i'))
                ->value('input[name="end_datetime"]', now()->addDays(13)->setTime(15, 30)->format('Y-m-d\TH:i'))
                ->press('Opslaan')
                ->pause(1000)
                ->assertSee('Film succesvol ingepland');
        });
    }

    /**
     * @test
     * @group cinema
     */
    public function testCreateShowFailDateTime()
    {
        $cinema = Cinema::create([
            'name' => 'Vue',
            'location' => 'Eindhoven',
        ]);

        $cinema->halls()->create(['chair_rows' => 21, 'chair_row_seats' => 21 ]);
        $movie = CinemaMovie::create(['title' => 'toy story']);

        $this->browse(function (Browser $browser) use ($cinema) {
            $browser->loginAs(User::find(1))
                ->visit(route('admin.halls.shows.create', $cinema->halls->first()->id))
                ->select('movie_id', '1')
                ->value('input[name="start_datetime"]', now()->addDays(13)->setTime(14, 30)->format('Y-m-d\TH:i'))
                ->value('input[name="end_datetime"]', now()->addDays(13)->setTime(13, 30)->format('Y-m-d\TH:i'))
                ->press('Opslaan')
                ->pause(1000)
                ->assertSee('The start datetime must be a date before end datetime');
        });
    }
}
