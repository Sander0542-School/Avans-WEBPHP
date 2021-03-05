<?php

namespace App\Http\Livewire\Reservation\Event;

use Livewire\Component;
use Livewire\WithFileUploads;
use Str;

class Picture extends Component
{
    use WithFileUploads;

    public $picture;

    public function getRules()
    {
        return [
            'picture' => [
                'required',
                'image',
                'max:5120',
            ],
        ];
    }

    public function updatedPicture()
    {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.reservation.event.picture');
    }

    public function upload()
    {
        $this->validate();

        $path = $this->picture->storeAs('reservations/event', Str::uuid().'.'.$this->picture->getClientOriginalExtension(), 'public');

        if ($path != false) {
            $this->emitUp('pictureUploaded', $path);
        }
    }
}
