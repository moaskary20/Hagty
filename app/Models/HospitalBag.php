<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalBag extends Model
{
    use HasFactory;

    protected $fillable = [
        'delivery_preparation_id',
        'bag_type',
        'title',
        'description',
        'essential_items',
        'optional_items',
        'quantity_recommendations',
        'packing_tips',
        'when_to_pack',
        'bag_size_recommendation',
        'images',
        'priority_level',
        'is_active',
    ];

    protected $casts = [
        'essential_items' => 'array',
        'optional_items' => 'array',
        'quantity_recommendations' => 'array',
        'packing_tips' => 'array',
        'images' => 'array',
        'priority_level' => 'integer',
        'is_active' => 'boolean',
    ];

    public function deliveryPreparation()
    {
        return $this->belongsTo(DeliveryPreparation::class);
    }
}
