<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayingArea extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'address',
        'latitude',
        'longitude',
        'phone',
        'website',
        'fees',
        'opening_hours',
        'closing_hours',
        'age_range',
        'facilities',
        'description',
        'rating',
        'is_active'
    ];
    
    protected $casts = [
        'fees' => 'decimal:2',
        'facilities' => 'array',
        'rating' => 'decimal:1',
        'is_active' => 'boolean'
    ];
}
