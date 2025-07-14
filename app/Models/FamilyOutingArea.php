<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyOutingArea extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'address',
        'phone',
        'description',
        'rating',
        'price_range',
        'working_hours',
        'facilities',
        'website',
        'family_friendly',
        'age_group',
        'special_notes',
    ];

    protected $casts = [
        'facilities' => 'array',
        'rating' => 'decimal:1',
        'family_friendly' => 'boolean',
    ];
}
