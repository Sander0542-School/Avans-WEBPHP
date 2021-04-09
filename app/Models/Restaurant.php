<?php

namespace App\Models;

use App\Casts\Encryption;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $casts = [
        'opens_at' => 'datetime',
        'closes_at' => 'datetime',
        'name' => Encryption::class,
        'location' => Encryption::class,
    ];

    protected $fillable = [
        'restaurant_kitchen_id',
        'name',
        'location',
        'opens_at',
        'closes_at',
        'max_seats',
    ];

    public function kitchen()
    {
        return $this->hasOne(RestaurantKitchen::class, 'id', 'restaurant_kitchen_id');
    }

    public function reservations()
    {
        return $this->hasMany(RestaurantReservation::class);
    }
}
