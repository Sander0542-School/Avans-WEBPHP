<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Restaurants\CreateRequest;
use App\Http\Requests\Admin\Restaurants\UpdateRequest;
use App\Models\Restaurant;
use App\Models\RestaurantKitchen;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::orderBy('restaurant_kitchen_id')->orderBy('name')->get();

        return view('pages.admin.restaurants.index')->with('restaurants', $restaurants);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $kitchens = RestaurantKitchen::all();

        return view('pages.admin.restaurants.create')->with('kitchens', $kitchens);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Admin\Restaurants\CreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $validated = $request->validated();

        $restaurant = Restaurant::create($validated);

        if ($restaurant == null) {
            return redirect()->back()->with('message', 'danger:Could not create restaurant, please try again');
        }

        return redirect()->route('admin.restaurants.index')->with('message', 'success:Restaurant created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $kitchens = RestaurantKitchen::all();

        return view('pages.admin.restaurants.edit')->with('restaurant', $restaurant)->with('kitchens', $kitchens);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Admin\Restaurants\UpdateRequest $request
     * @param \App\Models\Restaurant $restaurant
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, Restaurant $restaurant)
    {
        $validated = $request->validated();

        if(!$restaurant->update($validated)) {
            return redirect()->back()->with('message', 'danger:Could not update restaurant, please try again');
        }

        return redirect()->route('admin.restaurants.index')->with('message', 'success:Restaurant updated.');
    }
}
