<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeddingDressDesigner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand_name',
        'description',
        'specialty',
        'experience_years',
        'address',
        'phone_numbers',
        'whatsapp_number',
        'email',
        'website_url',
        'instagram_url',
        'facebook_url',
        'google_maps_url',
        'portfolio_images',
        'working_hours',
        'price_range_min',
        'price_range_max',
        'offers_rentals',
        'offers_custom_design',
        'offers_alterations',
        'available_sizes',
        'dress_styles',
        'fabric_types',
        'is_featured',
        'rating',
        'total_reviews',
        'is_active'
    ];

    protected $casts = [
        'phone_numbers' => 'array',
        'portfolio_images' => 'array',
        'available_sizes' => 'array',
        'dress_styles' => 'array',
        'fabric_types' => 'array',
        'offers_rentals' => 'boolean',
        'offers_custom_design' => 'boolean',
        'offers_alterations' => 'boolean',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'price_range_min' => 'decimal:2',
        'price_range_max' => 'decimal:2',
        'rating' => 'decimal:1'
    ];

    // علاقة مع عروض المصمم
    public function offers()
    {
        return $this->hasMany(DesignerOffer::class);
    }

    // علاقة مع إعلانات الفيديو
    public function videoAds()
    {
        return $this->hasMany(DesignerVideoAd::class);
    }

    // علاقة مع لافتات التصاميم
    public function designBanners()
    {
        return $this->hasMany(DesignerBanner::class);
    }

    // علاقة مع المراجع والروابط
    public function references()
    {
        return $this->hasMany(DesignerReference::class);
    }
}
