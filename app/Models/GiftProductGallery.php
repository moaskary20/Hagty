<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftProductGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'wedding_gift_supplier_id',
        'gallery_name',
        'gallery_description',
        'gallery_images',
        'product_type',
        'price_range_min',
        'price_range_max',
        'available_colors',
        'available_sizes',
        'is_handmade',
        'is_customizable',
        'is_active',
    ];

    protected $casts = [
        'gallery_images' => 'array',
        'available_colors' => 'array',
        'available_sizes' => 'array',
        'is_handmade' => 'boolean',
        'is_customizable' => 'boolean',
        'is_active' => 'boolean',
        'price_range_min' => 'decimal:2',
        'price_range_max' => 'decimal:2',
    ];

    // علاقة مع مورد الهدايا
    public function giftSupplier()
    {
        return $this->belongsTo(WeddingGiftSupplier::class, 'wedding_gift_supplier_id');
    }
}
