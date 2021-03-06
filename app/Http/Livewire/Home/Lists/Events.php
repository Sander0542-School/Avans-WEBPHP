<?php

namespace App\Http\Livewire\Home\Lists;

use App\Models\CinemaShow;
use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;

class Events extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $showMovies = true;

    public $showEvents = true;

    public $order = 'name-asc';

    public $sortOrders = [
        'name',
        'start',
        'end',
        'location',
    ];

    public function render()
    {
        return view('livewire.home.lists.events', [
            'events' => $this->loadItems(),
        ]);
    }

    public function loadMovies()
    {
        $movies = CinemaShow::where('start_datetime', '>', now())->get();

        return $movies->map(function (CinemaShow $show) {
            return [
                'name' => $show->movie->title,
                'icon' => 'film',
                'location' => $show->cinema->location,
                'duration' => $show->start_datetime->format('d F H:i').' - '.$show->end_datetime->format('H:i'),
                'start' => $show->start_datetime->unix(),
                'end' => $show->end_datetime->unix(),
            ];
        });
    }

    public function loadEvents()
    {
        $events = Event::where('start_datetime', '>', now())->get();

        return $events->map(function (Event $event) {
            return [
                'name' => $event->name,
                'icon' => 'music',
                'location' => $event->location,
                'duration' => $event->start_datetime->format('d F').' - '.$event->end_datetime->format('d F'),
                'start' => $event->start_datetime->unix(),
                'end' => $event->end_datetime->unix(),
            ];
        });
    }

    public function loadItems()
    {
        $items = collect();

        if ($this->showEvents) {
            $items = $items->concat($this->loadEvents());
        }

        if ($this->showMovies) {
            $items = $items->concat($this->loadMovies());
        }

        $sort = explode('-', $this->order);

        $items = $items->sortBy($sort[0], SORT_NATURAL|SORT_FLAG_CASE, $sort[1] == 'desc');

        return $items->paginate(20);
    }
}
