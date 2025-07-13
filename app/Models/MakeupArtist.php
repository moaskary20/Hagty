<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MakeupArtist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'portfolio_images',
        'address',
        'google_maps_url',
        'phone',
        'profile_url',
        'description',
        'is_active',
    ];

    protected $casts = [
        'portfolio_images' => 'array',
        'is_active' => 'boolean',
    ];
}
