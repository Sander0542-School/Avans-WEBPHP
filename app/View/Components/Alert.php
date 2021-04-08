<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    private const availableTypes = [
        'primary',
        'secondary',
        'success',
        'danger',
        'warning',
        'info',
        'light',
        'dark',
    ];

    public $type;

    public $message;

    /**
     * Alert constructor.
     *
     * @param $message
     * @param $type
     */
    public function __construct($message, $type = 'primary')
    {
        $this->message = $message;
        $this->type = $type;

        $parts = explode(':', $this->message, 2);

        if (in_array($parts[0], self::availableTypes)) {
            $this->message = $parts[1];
            $this->type = $parts[0];
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
