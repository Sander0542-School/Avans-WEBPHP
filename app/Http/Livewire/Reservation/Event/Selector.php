<?php

namespace App\Http\Livewire\Reservation\Event;

use App\Models\Event;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Selector extends Component
{
    public $events = [];

    public $eventId;

    public $dataValid = false;

    public function getRules()
    {
        return [
            'eventId' => [
                'required',
                Rule::exists('events', 'id'),
            ],
        ];
    }

    public function render()
    {
        $this->events = Event::where('start_datetime', '>', now())->orderBy('start_datetime')->get();

        $validator = \Validator::make([
            'eventId' => $this->eventId,
        ], $this->getRules());

        if (! $validator->fails()) {
            $event = Event::find($this->eventId);
            $this->emitUp('eventSelected', $event);
        } else {
            $this->emitUp('eventDeselected');
        }

        return view('livewire.reservation.event.selector');
    }
}
