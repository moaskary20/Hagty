<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeddingHairStylist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'work_images',
        'address',
        'google_maps_url',
        'phone',
        'profile_url',
        'package',
        'venue',
        'description',
        'is_active',
    ];

    protected $casts = [
        'work_images' => 'array',
        'is_active' => 'boolean',
    ];
}
