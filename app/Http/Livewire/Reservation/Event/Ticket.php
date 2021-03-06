<?php

namespace App\Http\Livewire\Reservation\Event;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Ticket extends Component
{
    public $maxTickets = 1;

    public $eventId;

    /**
     * @var Event
     */
    public $event;

    public $ticketCount = 1;

    public $dayCount;

    public $startDate;

    public $dataValid = false;

    protected function rules()
    {
        return [
            'ticketCount' => [
                'required',
                'integer',
                'between:1,'.$this->maxTickets,
            ],
            'dayCount' => [
                'nullable',
                Rule::requiredIf(function () {
                    return sizeof($this->event->days) > 1;
                }),
                Rule::in(['0', '1', '2']),
            ],
            'startDate' => [
                'nullable',
                Rule::requiredIf(function () {
                    $eventDays = sizeof($this->event->days);

                    if ($eventDays > 1 && $this->dayCount == '1') {
                        return true;
                    }
                    if ($eventDays > 2 && $this->dayCount == '2') {
                        return true;
                    }

                    return false;
                }),
                'date',
                'after_or_equal:'.$this->event->start_datetime->format('Y-m-d'),
                'before_or_equal:'.$this->event->end_datetime->clone()->subDays($this->dayCount == '2' ? 1 : 0)->format('Y-m-d'),
            ],
        ];
    }

    public function mount()
    {
        $this->event = Event::find($this->eventId);
    }

    public function render()
    {
        $validator = \Validator::make([
            'ticketCount' => $this->ticketCount,
            'dayCount' => $this->dayCount,
            'startDate' => $this->startDate,
        ], $this->rules());

        $this->dataValid = ! $validator->fails();

        return view('livewire.reservation.event.ticket');
    }

    public function incrementTicket()
    {
        if ($this->ticketCount < $this->maxTickets) {
            $this->ticketCount++;
        }
    }

    public function decreaseTicket()
    {
        if ($this->ticketCount > 1) {
            $this->ticketCount--;
        }
    }

    public function confirmTicket()
    {
        $this->validate();

        $startDate = Carbon::make($this->event->start_datetime->toDateString());
        $endDate = Carbon::make($this->event->end_datetime->toDateString());

        if ($this->startDate != null) {
            $startDate = Carbon::make($this->startDate);
        }

        if ($this->dayCount == '1') {
            $endDate = $startDate->clone();
        } elseif ($this->dayCount == '2') {
            $endDate = $startDate->clone()->addDay();
        }

        $this->emitUp('ticketsConfirmed', $this->ticketCount, $startDate->format('Y-m-d'), $endDate->format('Y-m-d'));
    }
}
