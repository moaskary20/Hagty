<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyBabyCare extends Model
{
    use HasFactory;

    protected $fillable = [
        'week_number',
        'title',
        'baby_development_description',
        'baby_size_comparison',
        'baby_weight_range',
        'baby_length_range',
        'development_milestones',
        'ultrasound_details',
        'mother_symptoms',
        'recommended_foods',
        'forbidden_foods',
        'exercise_recommendations',
        'medical_checkups',
        'tips_and_advice',
        'images',
        'videos',
        'is_active',
    ];

    protected $casts = [
        'week_number' => 'integer',
        'development_milestones' => 'array',
        'mother_symptoms' => 'array',
        'recommended_foods' => 'array',
        'forbidden_foods' => 'array',
        'exercise_recommendations' => 'array',
        'medical_checkups' => 'array',
        'tips_and_advice' => 'array',
        'images' => 'array',
        'videos' => 'array',
        'is_active' => 'boolean',
    ];

    public function nutritionTips()
    {
        return $this->hasMany(NutritionTip::class);
    }

    public function healthWarnings()
    {
        return $this->hasMany(HealthWarning::class);
    }
}
