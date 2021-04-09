<?php

namespace App\Models;

use App\Casts\Encryption;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CinemaMovie extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'title' => Encryption::class,
    ];

    protected $fillable = ['title'];
}
