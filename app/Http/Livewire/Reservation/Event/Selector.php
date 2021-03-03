<?php

namespace App\Http\Livewire\Reservation\Event;

use App\Models\Event;
use Livewire\Component;

class Selector extends Component
{
    public $events = [];

    public $eventId;

    public function render()
    {
        $this->events = Event::where('start_datetime', '>', now())->orderBy('start_datetime')->get();

        $event = Event::find($this->eventId);
        if ($event != null) {
            $this->emitUp('eventChanged', $event);
        } else {
            $this->emitUp('eventDeselected');
        }

        return view('livewire.reservation.event.selector');
    }
}
