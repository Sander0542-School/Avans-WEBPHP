<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CinemaShowsTest extends DuskTestCase
{
    use DatabaseMigrations;

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
}
