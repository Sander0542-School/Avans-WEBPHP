<?php

namespace App\Providers;

use Faker\Factory;
use Faker\Generator;
use FakerRestaurant\Provider\en_US\Restaurant;
use Illuminate\Support\ServiceProvider;
use PointPlus\FakerCinema\Provider\Movie;

class FakerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Generator::class, function($app) {
            $faker = Factory::create('nl_NL');
            $faker->addProvider(new Restaurant($faker));
            $faker->addProvider(new Movie($faker));
            return $faker;
        });
    }
}
