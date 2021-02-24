<?php

namespace Database\Seeders;

use App\Models\Cinema;
use App\Models\CinemaHall;
use App\Models\User;
use Database\Factories\CinemaHallFactory;
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
         User::factory(10)->create();
         Cinema::factory(10)->create();
    }
}
