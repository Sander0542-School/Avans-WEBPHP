<?php

namespace Database\Seeders;

use App\Models\Cinema;
use App\Models\Event;
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
        User::factory(10)->create();

        Cinema::factory(5)->create();

        Event::factory(20)->create();
    }
}
