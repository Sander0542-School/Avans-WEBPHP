<?php

namespace Database\Seeders;

use App\Models\Cinema;
use App\Models\CinemaMovie;
use App\Models\Event;
use App\Models\RestaurantKitchen;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@test.nl',
            'password' => \Hash::make('password'),
            'country' => 'Nederland',
            'state' => 'Noord Brabant',
            'city' => 'Eindhoven',
            'zip_code' => '1234 AB',
            'street' => 'Weglaan',
            'building_number' => '12',
            'is_admin' => 1,
        ]);

        User::factory(10)->create();

        CinemaMovie::factory(50)->create();

        Cinema::factory(5)->create();

        Event::factory(20)->create();

        RestaurantKitchen::factory(10)->create();
    }
}
