<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeddingVenue extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'stars',
        'phone_numbers',
        'hall_images',
        'outdoor_images',
        'description',
        'google_maps_url',
        'website_url',
        'price_range_min',
        'price_range_max',
        'is_active',
    ];

    protected $casts = [
        'phone_numbers' => 'array',
        'hall_images' => 'array',
        'outdoor_images' => 'array',
        'is_active' => 'boolean',
        'price_range_min' => 'decimal:2',
        'price_range_max' => 'decimal:2',
    ];

    // علاقة مع اللافتات
    public function banners()
    {
        return $this->hasMany(WeddingVenueBanner::class);
    }

    // علاقة مع فيديوهات الإعلانات
    public function videos()
    {
        return $this->hasMany(WeddingVenueVideo::class);
    }

    // علاقة مع قوائم الطعام
    public function menus()
    {
        return $this->hasMany(WeddingVenueMenu::class);
    }

    // علاقة مع الباقات
    public function packages()
    {
        return $this->hasMany(WeddingVenuePackage::class);
    }
}
