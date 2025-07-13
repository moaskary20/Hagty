<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CateringService extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'contact_person',
        'address',
        'phone_numbers',
        'email',
        'website_url',
        'facebook_url',
        'instagram_url',
        'service_images',
        'description',
        'specialties',
        'min_order_value',
        'min_guests',
        'is_active',
    ];

    protected $casts = [
        'phone_numbers' => 'array',
        'service_images' => 'array',
        'specialties' => 'array',
        'is_active' => 'boolean',
        'min_order_value' => 'decimal:2',
    ];

    // علاقة مع القوائم
    public function menus()
    {
        return $this->hasMany(CateringMenu::class);
    }

    // علاقة مع الباقات
    public function packages()
    {
        return $this->hasMany(CateringPackage::class);
    }

    // علاقة مع اللافتات
    public function banners()
    {
        return $this->hasMany(CateringBanner::class);
    }

    // علاقة مع الفيديوهات
    public function videos()
    {
        return $this->hasMany(CateringVideo::class);
    }
}
