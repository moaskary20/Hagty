<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChildrenHospital extends Model
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
        'departments',
        'beds_count',
        'has_emergency',
        'has_icu',
        'facilities',
        'rating',
        'logo',
        'images',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'departments' => 'array',
        'images' => 'array',
        'rating' => 'decimal:2',
        'has_emergency' => 'boolean',
        'has_icu' => 'boolean',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];
}
