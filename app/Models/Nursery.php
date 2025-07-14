<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nursery extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'address',
        'latitude',
        'longitude',
        'phone',
        'email',
        'website',
        'rating',
        'age_range',
        'fees',
        'working_hours',
        'services',
        'description',
        'is_active'
    ];
    
    protected $casts = [
        'rating' => 'decimal:1',
        'fees' => 'decimal:2',
        'services' => 'array',
        'is_active' => 'boolean'
    ];
}
