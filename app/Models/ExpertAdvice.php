<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpertAdvice extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'expert_name',
        'expert_specialization',
        'content_type', // 'text', 'video', 'link'
        'content',
        'category', // 'pregnancy', 'delivery', 'baby_care', 'breastfeeding', 'health', 'nutrition'
        'is_featured',
        'views_count',
        'likes_count',
        'is_active'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'views_count' => 'integer',
        'likes_count' => 'integer'
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
