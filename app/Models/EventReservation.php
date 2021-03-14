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

    protected $fillable = [
        'event_id',
        'user_id',
        'ticket_count',
        'picture',
        'start_date',
        'end_date',
    ];

    /**
     * Get the event for the reservation.
     */
    public function event()
    {
        return $this->hasOne(EventReservation::class);
    }

    /**
     * Get the event for the reservation.
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
