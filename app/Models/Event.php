<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $casts = [
        'start_datetime' => 'datetime',
        'end_datetime' => 'datetime'
    ];

    /**
     * Get the reservations for the event.
     */
    public function reservations()
    {
        return $this->hasMany(EventReservation::class);
    }
}
