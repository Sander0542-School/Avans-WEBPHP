<?php

namespace Tests\Browser;

use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Admin\Event\CreatePage;
use Tests\Browser\Pages\Admin\Event\IndexPage;
use Tests\DuskTestCase;

class EventTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testCreateEvent()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visitRoute('admin.events.index')
                ->click('#createEvent')
                ->waitForRoute('admin.events.create')
                ->pause(1000)

                ->type('name', 'Pinkpop')
                ->type('location', 'Kerkrade')
                ->value('input[name="start_datetime"]', now()->addDays(13)->setTime(14, 30)->format('Y-m-d\TH:i'))
                ->value('input[name="end_datetime"]', now()->addDays(19)->setTime(12, 0)->format('Y-m-d\TH:i'))
                ->type('max_tickets', 4)
                ->click('input[type="submit"]')
                ->waitForRoute('admin.events.index')
                ->pause(1000)

                ->assertSee('Pinkpop')
                ->assertSee('Kerkrade')

                ->click('table > tbody > tr > td > a')
                ->waitForRoute('admin.events.edit', 1)
                ->pause(1000)

                ->type('location', 'Landgraaf')
                ->click('input[type="submit"]')
                ->waitForRoute('admin.events.index')
                ->pause(1000)

                ->assertSee('Pinkpop')
                ->assertSee('Landgraaf');
        });
    }

    public function testReserveEvent()
    {
        Event::create([
            'name' => 'Pinkpop',
            'location' => 'Landgraaf',
            'start_datetime' => now()->addDays(13)->setTime(14, 30),
            'end_datetime' => now()->addDays(19)->setTime(12, 0),
            'max_tickets' => 4,
        ]);

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visitRoute('home.events')
                ->assertSee('Pinkpop')
                ->click('table > tbody > tr')
                ->waitForRoute('reservation.event')
                ->pause(1000)

                ->click('button[wire\:click="stepSelect"]')
                ->waitForText(__('reservation.event.title.step.2'))
                ->pause(1000)

                ->click('button[wire\:click="incrementTicket"]')
                ->pause(3000)

                ->select('#inputDayCount', '0')
                ->pause(3000)

                ->click('button[wire\:click="confirmTicket"]')
                ->waitForText(__('reservation.event.title.step.3'))
                ->pause(1000)

                ->attach('#inputPicture', base_path('storage/app/public/reservations/event/example.jpg'))
                ->pause(3000)

                ->click('button[type="submit"]')
                ->waitForText(__('reservation.event.title.step.4'))
                ->pause(1000)

                ->assertSee('Pinkpop')
                ->assertSee('Landgraaf')

                ->click('button[wire\:click="finishReservation"]')
                ->pause(3000)

                ->waitForText(__('reservation.event.title.step.5'))
                ->pause(1000)

                ->click('button[wire\:click="goHome"]')
                ->pause(3000)

                ->waitForRoute('home');
        });
    }
}
