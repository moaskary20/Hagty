<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BabyDayStep extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'step_number',
        'age_group',
        'category',
        'difficulty_level',
        'image',
        'tips',
        'is_active'
    ];

    protected $casts = [
        'tips' => 'array',
        'is_active' => 'boolean'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByAgeGroup($query, $ageGroup)
    {
        return $query->where('age_group', $ageGroup);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }
}
