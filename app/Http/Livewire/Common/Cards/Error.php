<?php

namespace App\Http\Livewire\Common\Cards;

use Livewire\Component;

class Error extends Component
{
    public $title;
    public $subtitle;

    public function render()
    {
        return view('livewire.common.cards.error');
    }

    public function goHome()
    {
        $this->redirectRoute('home');
    }
}
