<?php

namespace Tests\Unit;

use App\Http\Livewire\Reservation\Cinema\SelectChair;
use App\Models\Cinema;
use App\Models\CinemaHall;
use App\Models\CinemaMovie;
use App\Models\CinemaReservation;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Livewire;
use Tests\TestCase;

class CinemaTest extends TestCase
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

    function test_can_create_reservation()
    {
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


    function test_can_update_cinema()
    {
        $cinema = Cinema::create([
            'name' => 'Vue',
            'location' => 'Eindhoven',
        ]);

        $response = $this->put(route('admin.cinemas.update', ['cinema' => $cinema->id]), [
            'name' => 'Pathe',
            'location' => 'Eindhoven',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('admin.cinemas.index'));

    }

    function test_can_create_cinema_wrong_data_location()
    {
        $cinema = Cinema::create([
            'name' => 'Vue',
            'location' => 'Eindhoven',
        ]);

        $response = $this->put(route('admin.cinemas.update', ['cinema' => $cinema->id]), [
            'name' => 'Pathe',
        ]);

        $response->assertSessionHasErrors('location');

    }

    function test_can_create_cinema_hall()
    {
        $cinema = Cinema::create([
            'name' => 'Vue',
            'location' => 'Eindhoven',
        ]);

        $response = $this->post(route('admin.cinemas.halls.store', ['cinema' => $cinema->id]), [
            'chair_rows' => '15',
            'chair_row_seats' => '15',
            'cinema' => $cinema->id,
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('admin.cinemas.halls.index', ['cinema' => $cinema->id]));

    }

    function test_can_create_cinema_hall_to_big()
    {
        $cinema = Cinema::create([
            'name' => 'Vue',
            'location' => 'Eindhoven',
        ]);

        $response = $this->post(route('admin.cinemas.halls.store', ['cinema' => $cinema->id]), [
            'chair_rows' => '15',
            'chair_row_seats' => '22',
            'cinema' => $cinema->id,
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('admin.cinemas.halls.index', ['cinema' => $cinema->id]));

    }

    function test_can_create_cinema_show()
    {
        $cinema = Cinema::create([
            'name' => 'Vue',
            'location' => 'Eindhoven',
        ]);

        $cinema->halls()->create([
            'chair_rows' => '15',
            'chair_row_seats' => '15',
        ]);


        $movie = CinemaMovie::create([
            'title' => 'toy story'
        ]);

        $response = $this->post(route('admin.halls.shows.store', ['hall' => $cinema->halls()->first()->id]), [
            'cinema_hall_id' => $cinema->halls()->first()->id,
            'movie_id' => $movie->id,
            'start_datetime' =>  now()->addDays(13)->setTime(14, 30)->format('Y-m-d\TH:i'),
            'end_datetime' =>  now()->addDays(13)->setTime(14, 50)->format('Y-m-d\TH:i')
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('admin.halls.shows.index', ['hall' => $cinema->halls()->first()->id]));

    }

    function test_can_not_create_cinema_show()
    {
        $cinema = Cinema::create([
            'name' => 'Vue',
            'location' => 'Eindhoven',
        ]);

        $cinema->halls()->create([
            'chair_rows' => '15',
            'chair_row_seats' => '15',
        ]);

        $response = $this->post(route('admin.halls.shows.store', ['hall' => $cinema->halls()->first()->id]), [
            'cinema_hall_id' => $cinema->halls()->first()->id,
            'movie_id' => 55,
            'start_datetime' =>  now()->addDays(13)->setTime(14, 30)->format('Y-m-d\TH:i'),
            'end_datetime' =>  now()->addDays(13)->setTime(14, 50)->format('Y-m-d\TH:i')
        ]);

        $response->assertSessionHasErrors('movie_id');

    }

    function test_can_create_cinema()
    {
        $response = $this->post(route('admin.cinemas.store'), [
            'name' => 'vue',
            'location' => 'Geldrop',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('admin.cinemas.index'));

    }

    function test_can_not_create_cinema_wrong_data()
    {
        $response = $this->post(route('admin.cinemas.store'), [
            'name' => 'vue',

        ]);

        $response->assertSessionHasErrors('location');

        $response = $this->post(route('admin.cinemas.store'), [
            'location' => 'Geldrop',
        ]);

        $response->assertSessionHasErrors('name');

    }

    function test_can_create_movie()
    {
        $response = $this->post(route('admin.movies.store'), [
            'title' => 'harry potter',
        ]);

        $response->assertRedirect(route('admin.movies.index'));

    }

    function test_can_update_movie()
    {
        $movie = CinemaMovie::create(['title' => 'harry potter 7']);


        $response = $this->put(route('admin.movies.update',['movie' => $movie->id]), [
            'title' => 'harry potter 8',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('admin.movies.index'));

    }

}
