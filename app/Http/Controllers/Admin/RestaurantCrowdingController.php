<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Carbon\Carbon;

class RestaurantCrowdingController extends Controller
{
    private const States = [
        'quiet',
        'crowded',
        'busy',
    ];

    public function index()
    {
        $crowdedRestaurants = collect();
        $restaurants = Restaurant::all();

        $dayPart = ceil(now()->diffInMinutes(Carbon::today()) / 30);

        foreach ($restaurants as $restaurant) {
            $reservationsNow = $restaurant->reservations()->where('day', Carbon::today())->whereBetween('day_part', [$dayPart - 2, $dayPart + 3])->count();

            $stateIndex = (int)floor((sizeof(self::States) / $restaurant->max_seats) * $reservationsNow);

            $data = [
                'name' => $restaurant->name,
                'seats' => $restaurant->max_seats,
                'reservations' => $reservationsNow,
                'state' => self::States[$stateIndex],
            ];

            $crowdedRestaurants->add((object)$data);
        }

        return view('pages.admin.restaurants.crowding.index')->with('restaurants', $crowdedRestaurants);
    }
}
