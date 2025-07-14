<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BabyExpertAdvice extends Model
{
    use HasFactory;

    protected $fillable = [
        'expert_name',
        'expert_title',
        'expert_specialization',
        'title',
        'content',
        'category',
        'target_age',
        'expert_image',
        'video_url',
        'rating',
        'is_featured',
        'is_active'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByExpert($query, $expertName)
    {
        return $query->where('expert_name', $expertName);
    }
}
