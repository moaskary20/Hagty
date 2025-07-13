<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NutritionTip extends Model
{
    use HasFactory;

    protected $fillable = [
        'weekly_baby_care_id',
        'category',
        'title',
        'description',
        'food_items',
        'benefits',
        'preparation_tips',
        'serving_suggestions',
        'nutritional_values',
        'images',
        'is_recommended',
        'is_active',
    ];

    protected $casts = [
        'food_items' => 'array',
        'benefits' => 'array',
        'preparation_tips' => 'array',
        'serving_suggestions' => 'array',
        'nutritional_values' => 'array',
        'images' => 'array',
        'is_recommended' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function weeklyBabyCare()
    {
        return $this->belongsTo(WeeklyBabyCare::class);
    }
}
