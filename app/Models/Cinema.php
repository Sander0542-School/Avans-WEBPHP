<?php

namespace App\Models;

use App\Casts\Encryption;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cinema extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'name' => Encryption::class,
        'location' => Encryption::class,
    ];

    protected $fillable = [
        'name',
        'location',
    ];

    public function halls()
    {
        return $this->hasMany(CinemaHall::class);
    }

    public function shows()
    {
        return $this->hasManyThrough(CinemaShow::class, CinemaHall::class);
    }

}
