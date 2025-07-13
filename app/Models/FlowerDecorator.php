<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlowerDecorator extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'specialty',
        'phone_numbers',
        'email',
        'address',
        'description',
        'portfolio_images',
        'website_url',
        'instagram_url',
        'facebook_url',
        'starting_price',
        'services_offered',
        'is_active',
    ];

    protected $casts = [
        'phone_numbers' => 'array',
        'portfolio_images' => 'array',
        'services_offered' => 'array',
        'is_active' => 'boolean',
        'starting_price' => 'decimal:2',
    ];

    // علاقة مع باقات الزفاف
    public function weddingPackages()
    {
        return $this->hasMany(FlowerWeddingPackage::class);
    }

    // علاقة مع اللافتات الراعية
    public function sponsorBanners()
    {
        return $this->hasMany(FlowerSponsorBanner::class);
    }

    // علاقة مع فيديوهات الإعلانات
    public function videoAds()
    {
        return $this->hasMany(FlowerVideoAd::class);
    }
}
