<?php

namespace App\Models;

use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $casts = [
        'start_datetime' => 'date',
        'end_datetime' => 'date'
    ];

    /**
     * Get the reservations for the event.
     */
    public function reservations()
    {
        return $this->hasMany(EventReservation::class);
    }

    public function getDaysAttribute()
    {
        return CarbonPeriod::create($this->start_datetime->format('Y-m-d'),$this->end_datetime->format('Y-m-d'))->toArray();
    }
}
