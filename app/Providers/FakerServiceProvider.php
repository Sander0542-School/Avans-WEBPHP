<?php

namespace App\Providers;

use Faker\Factory;
use Faker\Provider\Base;
use FakerRestaurant\Provider\en_US\Restaurant;
use Illuminate\Support\ServiceProvider;

class FakerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Faker', function($app) {
            $faker = Factory::create();
            $faker->addProvider(new Restaurant($faker));
            return $faker;
        });
    }
}
