<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BabyShowerItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'delivery_preparation_id',
        'category',
        'item_name',
        'description',
        'suggested_quantity',
        'price_range',
        'where_to_buy',
        'alternatives',
        'importance_rating',
        'age_suitability',
        'safety_notes',
        'images',
        'brand_recommendations',
        'is_essential',
        'is_active',
    ];

    protected $casts = [
        'suggested_quantity' => 'integer',
        'where_to_buy' => 'array',
        'alternatives' => 'array',
        'importance_rating' => 'integer',
        'age_suitability' => 'array',
        'safety_notes' => 'array',
        'images' => 'array',
        'brand_recommendations' => 'array',
        'is_essential' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function deliveryPreparation()
    {
        return $this->belongsTo(DeliveryPreparation::class);
    }
}
