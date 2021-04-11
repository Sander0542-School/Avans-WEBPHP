<?php

namespace Tests\Browser;

use App\Models\Restaurant;
use App\Models\RestaurantKitchen;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RestaurantTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testCreateRestaurant()
    {
        RestaurantKitchen::create([
            'name' => 'Burgers'
        ]);

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visitRoute('admin.restaurants.index')
                ->click('#createRestaurant')
                ->waitForRoute('admin.restaurants.create')
                ->pause(1000)

                ->type('name', 'Five Guys')
                ->type('location', 'Eindhoven')
                ->select('restaurant_kitchen_id', '1')
                ->value('input[name="opens_at"]', now()->setTime(16, 30)->format('H:i'))
                ->value('input[name="closes_at"]', now()->setTime(22, 0)->format('H:i'))
                ->type('max_seats', 20)
                ->click('input[type="submit"]')
                ->waitForRoute('admin.restaurants.index')
                ->pause(1000)

                ->assertSee('Five Guys')
                ->assertSee('Eindhoven')

                ->click('table > tbody > tr > td > a')
                ->waitForRoute('admin.restaurants.edit', 1)
                ->pause(1000)

                ->type('location', 'Den Bosch')
                ->click('input[type="submit"]')
                ->waitForRoute('admin.restaurants.index')
                ->pause(1000)

                ->assertSee('Five Guys')
                ->assertSee('Den Bosch');
        });
    }

    public function testReserveRestaurant()
    {
        RestaurantKitchen::create([
            'name' => 'Burgers'
        ]);

        Restaurant::create([
            'name' => 'Five Guys',
            'location' => 'Eindhoven',
            'restaurant_kitchen_id' => 1,
            'opens_at' => now()->setTime(16, 30),
            'closes_at' => now()->setTime(22, 0),
            'max_seats' => 20,
        ]);

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visitRoute('home.restaurants')
                ->assertSee('Five Guys')
                ->click('.card a')
                ->waitForRoute('reservation.restaurant')
                ->pause(1000)

                ->click('button[wire\:click="stepSelect"]')
                ->waitForText(__('reservation.restaurant.title.step.2'))
                ->pause(1000)

                ->select('#inputRestaurantDay', Carbon::tomorrow()->format('Y-m-d'))
                ->pause(3000)

                ->select('#inputRestaurantDayPart', '40')
                ->pause(3000)

                ->click('button[wire\:click="confirmTime"]')
                ->waitForText(__('reservation.restaurant.title.step.3'))
                ->pause(1000)

                ->assertSee('Five Guys')
                ->assertSee('Eindhoven')
                ->assertSee('20:00')

                ->click('button[wire\:click="finishReservation"]')
                ->pause(3000)

                ->waitForText(__('reservation.restaurant.title.step.4'))
                ->pause(1000)

                ->click('button[wire\:click="goHome"]')
                ->pause(3000)

                ->waitForRoute('home');
        });
    }
}
