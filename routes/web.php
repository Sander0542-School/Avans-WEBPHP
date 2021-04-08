<?php

use App\Http\Controllers\CinemaController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShowController;
use App\Http\Livewire\Reservation\Event\Index as ReservationEventIndex;
use App\Http\Livewire\Home\Events as HomeEvents;
use App\Http\Livewire\Home\Index as HomeIndex;
use App\Http\Livewire\Home\Restaurants as HomeRestaurants;
use App\Http\Livewire\Cinema\Index as CinemaIndex;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/reservation/event', ReservationEventIndex::class)->name('reservation.event');

    Route::resource('cinemas', CinemaController::class);
    Route::resource('cinemas.halls', HallController::class)->shallow();
    Route::resource('halls.shows', ShowController::class)->shallow();

    Route::get('/home', HomeIndex::class)->name('home');
    Route::get('/events', HomeEvents::class)->name('home.events');
    Route::get('/restaurants', HomeRestaurants::class)->name('home.restaurants');

    Route::get('/cinema', CinemaIndex::class)->name('home.cinemas');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


});
