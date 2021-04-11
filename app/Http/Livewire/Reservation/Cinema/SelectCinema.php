<?php

namespace App\Http\Livewire\Reservation\Cinema;

use App\Models\Cinema;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Validator;

class SelectCinema extends Component
{
    public $cinemas = [];

    public $cinemaId;

    public function getRules()
    {
        return [
            'cinemaId' => [
                'required',
                Rule::exists('cinemas', 'id'),
            ],
        ];
    }

    public function render()
    {
        $this->cinemas = Cinema::all()->sortBy('name');

        $validator = Validator::make([
            'cinemaId' => $this->cinemaId,
        ], $this->getRules());

        if (! $validator->fails()) {
            $cinema = Cinema::find($this->cinemaId);
            $this->emitUp('cinemaChanged', $cinema);
        } else {
            $this->emitUp('cinemaDeselected');
        }

        return view('livewire.reservation.cinema.select-cinema');
    }
}
