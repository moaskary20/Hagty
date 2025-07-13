<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftSupplierIdea extends Model
{
    use HasFactory;

    protected $fillable = [
        'wedding_gift_supplier_id',
        'idea_title',
        'idea_description',
        'idea_images',
        'occasion_type',
        'estimated_price',
        'preparation_days',
        'materials_used',
        'is_trending',
        'is_active',
    ];

    protected $casts = [
        'idea_images' => 'array',
        'materials_used' => 'array',
        'is_trending' => 'boolean',
        'is_active' => 'boolean',
        'estimated_price' => 'decimal:2',
    ];

    // علاقة مع مورد الهدايا
    public function giftSupplier()
    {
        return $this->belongsTo(WeddingGiftSupplier::class, 'wedding_gift_supplier_id');
    }
}
