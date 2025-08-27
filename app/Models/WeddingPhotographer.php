<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeddingPhotographer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'specialty',
        'description',
        'phone_numbers',
        'email',
        'website_url',
        'instagram_url',
        'facebook_url',
        'portfolio_images',
        'portfolio_videos',
        'price_range_min',
        'price_range_max',
        'is_active',
    ];

    protected $casts = [
        'phone_numbers' => 'array',
        'portfolio_images' => 'array',
        'portfolio_videos' => 'array',
        'is_active' => 'boolean',
        'price_range_min' => 'decimal:2',
        'price_range_max' => 'decimal:2',
    ];

    // علاقة مع الباقات
    public function packages()
    {
        return $this->hasMany(WeddingPhotographerPackage::class, 'photographer_id');
    }

    // علاقة مع اللافتات
    public function banners()
    {
        return $this->hasMany(WeddingPhotographerBanner::class, 'photographer_id');
    }

    // علاقة مع فيديوهات الإعلانات
    public function videos()
    {
        return $this->hasMany(WeddingPhotographerVideo::class, 'photographer_id');
    }
}
