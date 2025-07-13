<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DjPerformer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'specialty',
        'phone_numbers',
        'email',
        'description',
        'portfolio_images',
        'portfolio_videos',
        'website_url',
        'instagram_url',
        'facebook_url',
        'starting_price',
        'is_active',
    ];

    protected $casts = [
        'phone_numbers' => 'array',
        'portfolio_images' => 'array',
        'portfolio_videos' => 'array',
        'is_active' => 'boolean',
        'starting_price' => 'decimal:2',
    ];

    // علاقة مع باقات الزفاف
    public function weddingPackages()
    {
        return $this->hasMany(DjWeddingPackage::class);
    }

    // علاقة مع اللافتات
    public function banners()
    {
        return $this->hasMany(DjBanner::class);
    }

    // علاقة مع فيديوهات الإعلانات
    public function videoAds()
    {
        return $this->hasMany(DjVideoAd::class);
    }
}
