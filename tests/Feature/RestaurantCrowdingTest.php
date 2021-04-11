<?php

namespace Tests\Feature;

use App\Models\Restaurant;
use App\Models\RestaurantKitchen;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RestaurantCrowdingTest extends TestCase
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

        $this->actingAs($user);
    }

    public function test_crowd_quiet()
    {
        $restaurant = $this->getRestaurant();

        $dayPart = ceil(now()->diffInMinutes(Carbon::today()) / 30);

        $restaurant->reservations()->createMany([
            [
                'user_id' => 1,
                'day' => Carbon::today(),
                'day_part' => $dayPart,
            ],
            [
                'user_id' => 1,
                'day' => Carbon::today(),
                'day_part' => $dayPart + 1,
            ],
        ]);

        $response = $this->get(route('admin.restaurants.crowding.index'));

        $response->assertStatus(200);
        $response->assertSee(__('admin.restaurants.crowding.state.quiet'));
    }

    public function test_crowd_crowded()
    {
        $restaurant = $this->getRestaurant();

        $dayPart = ceil(now()->diffInMinutes(Carbon::today()) / 30);

        $restaurant->reservations()->createMany([
            [
                'user_id' => 1,
                'day' => Carbon::today(),
                'day_part' => $dayPart,
            ],
            [
                'user_id' => 1,
                'day' => Carbon::today(),
                'day_part' => $dayPart + 1,
            ],
            [
                'user_id' => 1,
                'day' => Carbon::today(),
                'day_part' => $dayPart - 1,
            ],
            [
                'user_id' => 1,
                'day' => Carbon::today(),
                'day_part' => $dayPart + 1,
            ],
        ]);

        $response = $this->get(route('admin.restaurants.crowding.index'));

        $response->assertStatus(200);
        $response->assertSee(__('admin.restaurants.crowding.state.crowded'));
    }

    public function test_crowd_busy()
    {
        $restaurant = $this->getRestaurant();

        $dayPart = ceil(now()->diffInMinutes(Carbon::today()) / 30);

        $restaurant->reservations()->createMany([
            [
                'user_id' => 1,
                'day' => Carbon::today(),
                'day_part' => $dayPart,
            ],
            [
                'user_id' => 1,
                'day' => Carbon::today(),
                'day_part' => $dayPart + 1,
            ],
            [
                'user_id' => 1,
                'day' => Carbon::today(),
                'day_part' => $dayPart - 1,
            ],
            [
                'user_id' => 1,
                'day' => Carbon::today(),
                'day_part' => $dayPart + 1,
            ],
            [
                'user_id' => 1,
                'day' => Carbon::today(),
                'day_part' => $dayPart + 2,
            ],
            [
                'user_id' => 1,
                'day' => Carbon::today(),
                'day_part' => $dayPart,
            ],
            [
                'user_id' => 1,
                'day' => Carbon::today(),
                'day_part' => $dayPart + 1,
            ],
            [
                'user_id' => 1,
                'day' => Carbon::today(),
                'day_part' => $dayPart - 1,
            ],
        ]);

        $response = $this->get(route('admin.restaurants.crowding.index'));

        $response->assertStatus(200);
        $response->assertSee(__('admin.restaurants.crowding.state.busy'));
    }

    private function getRestaurant()
    {
        return Restaurant::create([
            'name' => 'Five Guys',
            'location' => 'Eindhoven',
            'restaurant_kitchen_id' => RestaurantKitchen::first()->id,
            'opens_at' => now()->setTime(16, 30)->format('H:i'),
            'closes_at' => now()->setTime(22, 0)->format('H:i'),
            'max_seats' => 9,
        ]);
    }
}
