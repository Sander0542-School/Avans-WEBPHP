<?php

namespace App\Http\Livewire\Home\Lists;

use App\Models\Cinema;
use App\Models\CinemaShow;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class Events extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $showMovies = true;

    public $showEvents = true;

    public $order = 'start-asc';

    public $location = null;

    public $dateStart;
    public $dateEnd;

    public $sortOrders = [
        'start',
        'end',
        'name',
        'location',
    ];

    public $locations = [];

    public function mount()
    {
        $locations = collect();
        $locations = $locations->concat(Event::all('location')->pluck('location'));
        $locations = $locations->concat(Cinema::all('location')->pluck('location'));

        $this->locations = $locations->toArray();

        $this->dateStart = now()->format('Y-m-d');
        $this->dateEnd = now()->addWeeks(10)->format('Y-m-d');
    }

    public function render()
    {
        return view('livewire.home.lists.events')->with('events', $this->loadItems());
    }

    public function loadMovies()
    {
        $movies = CinemaShow::where('start_datetime', '>', Carbon::make($this->dateStart))
            ->where('start_datetime', '<=', Carbon::make($this->dateEnd));

        if (!empty($this->location)) {
            $movies->whereHas('cinema', function (Builder $query) {
                $query->where('location', $this->location);
            });
        }

        return $movies->get()->map(function (CinemaShow $show) {
            return [
                'name' => $show->movie->title,
                'icon' => 'film',
                'location' => $show->cinema->location,
                'duration' => $show->start_datetime->format('d F H:i').' - '.$show->end_datetime->format('H:i'),
                'start' => $show->start_datetime->unix(),
                'end' => $show->end_datetime->unix(),
                'reservation_url' => route('reservation.cinema', ['showId' => $show->id])
            ];
        });
    }

    public function loadEvents()
    {
        $events = Event::where('start_datetime', '>=', Carbon::make($this->dateStart))
            ->where('start_datetime', '<=', Carbon::make($this->dateEnd));

        if (!empty($this->location)) {
            $events->where('location', $this->location);
        }

        return $events->get()->map(function (Event $event) {
            return [
                'name' => $event->name,
                'icon' => 'music',
                'location' => $event->location,
                'duration' => $event->start_datetime->format('d F').' - '.$event->end_datetime->format('d F'),
                'start' => $event->start_datetime->unix(),
                'end' => $event->end_datetime->unix(),
                'reservation_url' => route('reservation.event', ['eventId' => $event->id]),
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

        $items = $items->sortBy($sort[0], SORT_NATURAL | SORT_FLAG_CASE, $sort[1] == 'desc');

        return $items->paginate(20);
    }
}
