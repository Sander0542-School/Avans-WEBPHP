<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventReservation extends Model
{
    use HasFactory;

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date'
    ];

    /**
     * Get the event for the reservation.
     */
    public function event()
    {
        return $this->hasOne(EventReservation::class);
    }
}