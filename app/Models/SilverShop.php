<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SilverShop extends Model
{
    protected $fillable = [
        'name',
        'description',
        'address',
        'phone',
        'whatsapp',
        'email',
        'website',
        'city',
        'logo',
        'cover_image',
        'images',
        'products',
        'services',
        'rating',
        'views_count',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'images' => 'array',
        'rating' => 'decimal:2',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];
}
