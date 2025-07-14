<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BabyMonthlyGrowth extends Model
{
    use HasFactory;

    protected $fillable = [
        'month_number',
        'title',
        'description',
        'physical_development',
        'mental_development',
        'social_development',
        'milestones',
        'feeding_info',
        'sleep_info',
        'safety_tips',
        'weight_range',
        'height_range',
        'image',
        'activities',
        'warning_signs',
        'is_active'
    ];

    protected $casts = [
        'physical_development' => 'array',
        'mental_development' => 'array',
        'social_development' => 'array',
        'milestones' => 'array',
        'feeding_info' => 'array',
        'sleep_info' => 'array',
        'safety_tips' => 'array',
        'activities' => 'array',
        'warning_signs' => 'array',
        'is_active' => 'boolean'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByMonth($query, $monthNumber)
    {
        return $query->where('month_number', $monthNumber);
    }
}
