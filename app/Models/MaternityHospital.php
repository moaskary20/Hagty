<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaternityHospital extends Model
{
    protected $fillable = [
        'name',
        'description',
        'address',
        'city',
        'phone',
        'emergency_phone',
        'email',
        'website',
        'services',
        'beds_count',
        'has_nicu',
        'has_parking',
        'facilities',
        'rating',
        'logo',
        'images',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'services' => 'array',
        'images' => 'array',
        'rating' => 'decimal:2',
        'has_nicu' => 'boolean',
        'has_parking' => 'boolean',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];
}
