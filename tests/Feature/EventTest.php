<?php

namespace Tests\Feature;

use App\Http\Livewire\Reservation\Event\Index as ReservationEventIndex;
use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class EventTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

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

        Livewire::actingAs($user);
        $this->actingAs($user);
    }

    public function test_create_event()
    {
        $response = $this->post(route('admin.events.store'), [
            'name' => 'Pinkpop',
            'location' => 'Landgraaf',
            'start_datetime' => now()->addDays(13)->setTime(14, 30)->format('Y-m-d\TH:i'),
            'end_datetime' => now()->addDays(19)->setTime(12, 0)->format('Y-m-d\TH:i'),
            'max_tickets' => 4,
        ]);

        $response->assertRedirect(route('admin.events.index'));
    }

    public function test_edit_event()
    {
        $event = Event::create([
            'name' => 'Pinkpop',
            'location' => 'Kerkrade',
            'start_datetime' => now()->addDays(13)->setTime(14, 30),
            'end_datetime' => now()->addDays(19)->setTime(12, 0),
            'max_tickets' => 4,
        ]);

        $response = $this->put(route('admin.events.update', ['event' => $event]), [
            'name' => 'Pinkpop',
            'location' => 'Landgraaf',
            'start_datetime' => now()->addDays(13)->setTime(14, 30)->format('Y-m-d\TH:i'),
            'end_datetime' => now()->addDays(19)->setTime(12, 0)->format('Y-m-d\TH:i'),
            'max_tickets' => 4,
        ]);

        $response->assertRedirect(route('admin.events.index'));
    }

    public function test_reserve_event()
    {
        $event = Event::create([
            'name' => 'Pinkpop',
            'location' => 'Landgraaf',
            'start_datetime' => now()->addDays(13)->setTime(14, 30),
            'end_datetime' => now()->addDays(19)->setTime(12, 0),
            'max_tickets' => 4,
        ]);

        Livewire::test(ReservationEventIndex::class)
            ->call('eventSelected', $event)
            ->assertSee($event->name)
            ->assertSee($event->location)
            ->call('ticketsConfirmed', 2, now()->addDays(13)->format('Y-m-d'), now()->addDays(19)->format('Y-m-d'))
            ->call('pictureConfirmed', 'reservations/event/example.jpg')
            ->assertSee($event->name)
            ->assertSee($event->location)
            ->call('finishReservation')
            ->assertSee(__('reservation.event.title.step.5'));
    }
}
