<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\DownloadController;
use App\Http\Livewire\Reservation\Event\Index as ReservationEventIndex;
use App\Http\Livewire\Home\Events as HomeEvents;
use App\Http\Livewire\Home\Index as HomeIndex;
use App\Http\Livewire\Home\Restaurants as HomeRestaurants;
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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::prefix('reservation')->name('reservation.')->group(function () {
        Route::get('event', ReservationEventIndex::class)->name('event');
        Route::get('restaurant', ReservationRestaurantIndex::class)->name('restaurant');
    });

    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('events', EventController::class)->except(['show', 'destroy']);
        Route::resource('restaurants', RestaurantController::class)->except(['show', 'destroy']);

        Route::prefix('/downloads')->group(function () {
            Route::get('', [DownloadController::class, 'index'])->name('downloads.index');
            Route::get('events', [DownloadController::class, 'events'])->name('downloads.events');
        });
    });
});
