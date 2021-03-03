<?php

namespace App\Http\Livewire;

use App\Models\Cinema;
use App\Models\CinemaHall;
use App\Models\CinemaShow;
use Livewire\Component;

class ShowAllCinemas extends Component
{
    public $cinemaId;
    public $halls=[];
    public $movies=[];
    public $movie;
    public $persons;

    protected $rules = [
        'movie.id' => ['required'],

    ];


    public function render()
    {
        if(!empty($this->cinemaId)) {
            $cinema = Cinema::find($this->cinemaId);
            //$this->halls = CinemaHall::where('cinema_id', $this->cinema)->get();
            //$this->movies = CinemaShow::whereIn('cinema_hall_id', $this->cinema->halls->pluck('id')->toArray())->get();

            //$this->movies = $cinema->shows()->where('start_datetime', '>', now() )->get();
            $this->movies = $cinema->shows()->get();
            //dd($this->movies);
        }
        return view('livewire.cinema.show-all-cinemas')->withCinemas(Cinema::orderBy('name')->get());
    }
}
