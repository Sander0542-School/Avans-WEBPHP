<?php

namespace App\Http\Livewire\Reservation\Restaurant;

use App\Models\Restaurant;
use App\Models\RestaurantReservation;
use Livewire\Component;

class Index extends Component
{
    protected $queryString = [
        'restaurantId'
    ];

    protected $listeners = [
        'restaurantSelected' => 'restaurantSelected',
        'restaurantDeselected' => 'restaurantDeselected',
        'timeConfirmed' => 'timeConfirmed',
        'pictureUploaded' => 'pictureConfirmed',
    ];

    /**
     * @var Restaurant
     */
    public $restaurant;

    public $restaurantId;

    public $reservationStep = 0;

    public $reservation = [];

    public function mount()
    {
        if (!empty($this->restaurantId)) {
            $restaurant = Restaurant::find($this->restaurantId);

            $this->restaurantSelected($restaurant);
        }
    }

    public function render()
    {
        return view('livewire.reservation.restaurant.index');
    }

    private function resetEvent()
    {
        $this->reservationStep = $this->restaurant == null ? 0 : 1;
        $this->restaurantId = $this->restaurant == null ? null : $this->restaurant->id;
    }

    public function restaurantSelected(Restaurant $restaurant)
    {
        $this->restaurant = $restaurant;

        $this->resetEvent();
    }

    public function restaurantDeselected()
    {
        $this->restaurant = null;

        $this->resetEvent();
    }

    public function stepSelect()
    {
        $this->reservationStep = 2;
    }

    public function timeConfirmed($day, $dayPart)
    {
        $this->reservation['day'] = $day;
        $this->reservation['day_part'] = $dayPart;

        $this->reservationStep = 3;
    }

    public function finishReservation()
    {
        $this->reservation['restaurant_id'] = $this->restaurant->id;
        $this->reservation['user_id'] = auth()->user()->id;

        if (RestaurantReservation::create($this->reservation) != null) {
            $this->reservationStep = 4;
        } else {
            $this->reservationStep = 5;
        }
    }

    public function goHome()
    {
        $this->redirectRoute('home');
    }
}
