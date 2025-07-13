<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignerOffer extends Model
{
    use HasFactory;

    protected $fillable = [
        'wedding_dress_designer_id',
        'offer_title',
        'offer_description',
        'discount_percentage',
        'original_price',
        'discounted_price',
        'offer_images',
        'start_date',
        'end_date',
        'terms_conditions',
        'is_active',
        'max_uses',
        'current_uses'
    ];

    protected $casts = [
        'offer_images' => 'array',
        'start_date' => 'date',
        'end_date' => 'date',
        'is_active' => 'boolean',
        'original_price' => 'decimal:2',
        'discounted_price' => 'decimal:2'
    ];

    public function designer()
    {
        return $this->belongsTo(WeddingDressDesigner::class, 'wedding_dress_designer_id');
    }
}
