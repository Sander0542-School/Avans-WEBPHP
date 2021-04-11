<?php

namespace Tests\Unit;

use App\Http\Livewire\Reservation\Cinema\SelectChair;
use App\Models\Cinema;
use App\Models\CinemaMovie;
use App\Models\CinemaReservation;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Livewire;
use Tests\TestCase;

class CinemaTest extends TestCase
{
    use RefreshDatabase;


    function test_can_create_reservation()
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

        Livewire::actingAs($user);
        $this->actingAs($user);

        $cinema = Cinema::create([
            'name' => 'Vue',
            'location' => 'Eindhoven',
        ]);

        $hall = $cinema->halls()->create(['chair_rows' => 21, 'chair_row_seats' => 21]);

        $movie = CinemaMovie::create(['title' => 'toy story']);

        $show = $hall->shows()
            ->create(['movie_id' => $movie->id, 'start_datetime' => now()->addDays(13)
                ->setTime(14, 30)->format('Y-m-d\TH:i'), 'end_datetime' => now()->addDays(13)
                ->setTime(14, 50)->format('Y-m-d\TH:i'),
            ]);

        $selectedChairs = [
            ["row_id" => "2", "seat_id" => "2"],
            ["row_id" => "2", "seat_id" => "3"],
            ["row_id" => "2", "seat_id" => "4"],
        ];


        Livewire::test(SelectChair::class, ['show' => $show, 'selectedChairs' => $selectedChairs])
            ->call('confirmReservation');

        $this->assertTrue(CinemaReservation::where('user_id', User::find(1)->id)->where('cinema_show_id', $show->id)->exists());
    }


    function test_can_create_cinema()
    {
        $cinema = Cinema::create([
            'name' => 'Vue',
            'location' => 'Eindhoven',

        ]);

        $response = $this->put(route('admin.cinemas.update', ['cinema' => $cinema->id]), [
            'name' => 'Pathe',
            'location' => 'Eindhoven',
        ]);

        $response->assertRedirect(route('admin.cinemas.index'));

    }

}
