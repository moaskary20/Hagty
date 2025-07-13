<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrandmaAdvice extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'grandma_name',
        'grandma_age',
        'grandma_image',
        'advice_text',
        'advice_type', // 'text', 'audio', 'video'
        'media_url',
        'duration', // for audio/video
        'category', // 'pregnancy', 'delivery', 'baby_care', 'breastfeeding', 'family'
        'is_featured',
        'views_count',
        'likes_count',
        'is_active'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'views_count' => 'integer',
        'likes_count' => 'integer',
        'grandma_age' => 'integer'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }
}
