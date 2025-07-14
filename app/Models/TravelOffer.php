<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelOffer extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination',
        'date',
        'title',
        'description',
        'image',
        'video',
        'price',
        'active',
    ];
}
