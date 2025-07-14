<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BabyHealthInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'category',
        'age_range',
        'importance_level',
        'author',
        'source',
        'image',
        'related_links',
        'is_featured',
        'is_active'
    ];

    protected $casts = [
        'related_links' => 'array',
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

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }
}
