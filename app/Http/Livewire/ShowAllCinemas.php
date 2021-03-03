<?php

namespace App\Http\Livewire;

use App\Models\Cinema;
use App\Models\CinemaHall;
use App\Models\CinemaShow;
use Livewire\Component;

class ShowAllCinemas extends Component
{
    public $cinema;
    public $halls=[];
    public $movies=[];
    public $movie;

    protected $rules = [
        'movie.id' => ['required'],

    ];


    public function render()
    {
        if(!empty($this->cinema)) {
            $this->halls = CinemaHall::where('cinema_id', $this->cinema)->get();
            $this->movies = CinemaShow::whereIn('cinema_hall_id', $this->halls->pluck('id')->toArray())->get();
        }

        return view('livewire.cinema.show-all-cinemas')->withCinemas(Cinema::orderBy('name')->get());
    }
}
