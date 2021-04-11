<?php

use App\Http\Controllers\Admin\RestaurantCrowdingController;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DownloadController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Livewire\Home\Events as HomeEvents;
use App\Http\Livewire\Home\Index as HomeIndex;
use App\Http\Livewire\Home\Restaurants as HomeRestaurants;
use App\Http\Livewire\Reservation\Cinema\Index as ReservationCinemaIndex;
use App\Http\Livewire\Reservation\Event\Index as ReservationEventIndex;
use App\Http\Livewire\Reservation\Restaurant\Index as ReservationRestaurantIndex;
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

Route::get('', HomeIndex::class)->name('home');
Route::get('events', HomeEvents::class)->name('home.events');
Route::get('restaurants', HomeRestaurants::class)->name('home.restaurants');
Route::any('language', [HomeController::class, 'language'])->name('home.language');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::prefix('reservation')->name('reservation.')->group(function () {
        Route::get('cinema', ReservationCinemaIndex::class)->name('cinema');
        Route::get('event', ReservationEventIndex::class)->name('event');
        Route::get('restaurant', ReservationRestaurantIndex::class)->name('restaurant');
        Route::get('cinema/confirm/{id}', [CinemaController::class, 'confirm'])->name('cinema.confirm');
    });

    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('events', EventController::class)->except(['show', 'destroy']);
        Route::resource('restaurants', RestaurantController::class)->except(['show', 'destroy']);

        Route::resource('cinemas', CinemaController::class);
        Route::resource('cinemas.halls', HallController::class)->shallow();
        Route::resource('halls.shows', ShowController::class)->shallow();
        Route::resource('movies', MovieController::class)->shallow();

        Route::prefix('restaurants/crowding')->name('restaurants.crowding.')->group(function () {
            Route::get('', [RestaurantCrowdingController::class, 'index'])->name('index');
        });

        Route::prefix('downloads')->name('downloads.')->group(function () {
            Route::get('', [DownloadController::class, 'index'])->name('index');
            Route::get('events', [DownloadController::class, 'events'])->name('events');
        });
    });
});
