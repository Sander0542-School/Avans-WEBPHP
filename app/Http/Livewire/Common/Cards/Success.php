<?php

namespace App\Http\Livewire\Common\Cards;

use Livewire\Component;

class Success extends Component
{
    public $title;

    public function render()
    {
        return view('livewire.common.cards.success');
    }

    public function goHome()
    {
        $this->redirectRoute('home');
    }
}
