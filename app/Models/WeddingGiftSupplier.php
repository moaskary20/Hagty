<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeddingGiftSupplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'specialty',
        'phone_numbers',
        'email',
        'address',
        'description',
        'craft_specialties',
        'portfolio_images',
        'product_categories',
        'website_url',
        'instagram_url',
        'facebook_url',
        'whatsapp_number',
        'min_order_price',
        'delivery_days',
        'custom_orders',
        'is_active',
    ];

    protected $casts = [
        'phone_numbers' => 'array',
        'craft_specialties' => 'array',
        'portfolio_images' => 'array',
        'product_categories' => 'array',
        'custom_orders' => 'boolean',
        'is_active' => 'boolean',
        'min_order_price' => 'decimal:2',
    ];

    // علاقة مع معارض المنتجات
    public function productGalleries()
    {
        return $this->hasMany(GiftProductGallery::class);
    }

    // علاقة مع الأفكار
    public function ideas()
    {
        return $this->hasMany(GiftSupplierIdea::class);
    }
}
