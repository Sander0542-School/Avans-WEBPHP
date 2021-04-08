<?php

namespace App\Http\Livewire\Common\Cards;

use Livewire\Component;

class Message extends Component
{
    public $title;
    public $subtitle;

    public $icon;

    public function render()
    {
        return view('livewire.common.cards.message');
    }

    public function goHome()
    {
        $this->redirectRoute('home');
    }
}
