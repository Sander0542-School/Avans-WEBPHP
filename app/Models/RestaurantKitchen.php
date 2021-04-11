<?php

namespace App\Models;

use App\Casts\Encryption;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantKitchen extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    protected $casts = [
        'name' => Encryption::class,
    ];

    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }
}
