<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PediatricDoctor extends Model
{
    protected $fillable = [
        'name',
        'description',
        'specialty',
        'address',
        'phone',
        'whatsapp',
        'email',
        'city',
        'clinic_name',
        'consultation_fee',
        'working_hours',
        'rating',
        'years_of_experience',
        'photo',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'consultation_fee' => 'decimal:2',
        'rating' => 'decimal:2',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];
}
