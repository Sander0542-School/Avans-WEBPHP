<?php

namespace App\Models;

use App\Casts\Encryption;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $casts = [
        'start_datetime' => 'datetime',
        'end_datetime' => 'datetime',
        'name' => Encryption::class,
        'location' => Encryption::class,
    ];

    protected $fillable = [
        'name',
        'location',
        'start_datetime',
        'end_datetime',
        'max_tickets',
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
        return CarbonPeriod::create($this->start_datetime->format('Y-m-d'), $this->end_datetime->format('Y-m-d'))->toArray();
    }
}
