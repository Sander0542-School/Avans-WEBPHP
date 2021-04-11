<?php

namespace Tests\Feature;

use App\Http\Livewire\Reservation\Restaurant\Index as ReservationRestaurantIndex;
use App\Models\Restaurant;
use App\Models\RestaurantKitchen;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire;
use Tests\TestCase;

class RestaurantTest extends TestCase
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

        RestaurantKitchen::create([
            'name' => 'Burgers',
        ]);

        Livewire::actingAs($user);
        $this->actingAs($user);
    }

    public function test_create_restaurant()
    {
        $response = $this->post(route('admin.restaurants.store'), [
            'name' => 'Five Guys',
            'location' => 'Eindhoven',
            'restaurant_kitchen_id' => RestaurantKitchen::first()->id,
            'opens_at' => now()->setTime(16, 30)->format('H:i'),
            'closes_at' => now()->setTime(22, 0)->format('H:i'),
            'max_seats' => 4,
        ]);

        $response->assertRedirect(route('admin.restaurants.index'));
    }

    public function test_edit_restaurant()
    {
        $restaurant = Restaurant::create([
            'name' => 'Five Guys',
            'location' => 'Den Bosch',
            'restaurant_kitchen_id' => RestaurantKitchen::first()->id,
            'opens_at' => now()->setTime(16, 30)->format('H:i'),
            'closes_at' => now()->setTime(22, 0)->format('H:i'),
            'max_seats' => 4,
        ]);

        $response = $this->put(route('admin.restaurants.update', ['restaurant' => $restaurant]), [
            'name' => 'Five Guys',
            'location' => 'Eindhoven',
            'restaurant_kitchen_id' => RestaurantKitchen::first()->id,
            'opens_at' => now()->setTime(16, 30)->format('H:i'),
            'closes_at' => now()->setTime(22, 0)->format('H:i'),
            'max_seats' => 4,
        ]);

        $response->assertRedirect(route('admin.restaurants.index'));
    }

    public function test_reserve_restaurant()
    {
        $restaurant = Restaurant::create([
            'name' => 'Five Guys',
            'location' => 'Eindhoven',
            'restaurant_kitchen_id' => RestaurantKitchen::first()->id,
            'opens_at' => now()->setTime(16, 30)->format('H:i'),
            'closes_at' => now()->setTime(22, 0)->format('H:i'),
            'max_seats' => 4,
        ]);

        Livewire::test(ReservationRestaurantIndex::class)
            ->call('restaurantSelected', $restaurant)
            ->assertSee($restaurant->name)
            ->assertSee($restaurant->location)
            ->call('timeConfirmed', Carbon::tomorrow()->format('Y-m-d'), 40)
            ->call('finishReservation')
            ->assertSee(__('reservation.restaurant.title.step.4'));
    }
}
