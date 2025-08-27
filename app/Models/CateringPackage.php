<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CateringPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'catering_service_id',
        'package_name',
        'description',
        'included_items',
        'price_per_person',
        'min_persons',
        'max_persons',
        'package_images',
        'offer_type',
        'discount_percentage',
        'offer_valid_until',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'included_items' => 'array',
        'package_images' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'price_per_person' => 'decimal:2',
        'discount_percentage' => 'decimal:2',
        'offer_valid_until' => 'date',
    ];

    // علاقة مع شركة خدمات الطعام
    public function cateringService()
    {
        return $this->belongsTo(CateringService::class);
    }
}
