<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BabyShowerList extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'description',
        'category',
        'priority',
        'estimated_price',
        'recommended_brand',
        'quantity',
        'size_info',
        'age_suitability',
        'image',
        'features',
        'buying_tips',
        'season',
        'is_essential',
        'is_luxury',
        'is_active'
    ];

    protected $casts = [
        'estimated_price' => 'decimal:2',
        'features' => 'array',
        'buying_tips' => 'array',
        'is_essential' => 'boolean',
        'is_luxury' => 'boolean',
        'is_active' => 'boolean'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeEssential($query)
    {
        return $query->where('is_essential', true);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }
}
