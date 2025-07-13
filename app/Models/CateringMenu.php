<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CateringMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'catering_service_id',
        'menu_name',
        'menu_type',
        'description',
        'menu_items',
        'price_per_person',
        'min_persons',
        'menu_images',
        'is_available',
    ];

    protected $casts = [
        'menu_items' => 'array',
        'menu_images' => 'array',
        'is_available' => 'boolean',
        'price_per_person' => 'decimal:2',
    ];

    // علاقة مع شركة خدمات الطعام
    public function cateringService()
    {
        return $this->belongsTo(CateringService::class);
    }
}
