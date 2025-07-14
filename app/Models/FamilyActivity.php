<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_name',
        'category',
        'description',
        'location',
        'organizer',
        'contact_phone',
        'cost',
        'duration',
        'age_group',
        'requirements',
        'available_from',
        'available_to',
        'booking_method',
        'special_features',
        'is_seasonal',
    ];

    protected $casts = [
        'requirements' => 'array',
        'cost' => 'decimal:2',
        'available_from' => 'date',
        'available_to' => 'date',
        'is_seasonal' => 'boolean',
    ];
}
