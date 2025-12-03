<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BabyWelcomeGuide extends Model
{
    protected $fillable = [
        'title',
        'content',
        'category',
        'baby_age',
        'featured_image',
        'checklist',
        'tips',
        'views_count',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'checklist' => 'array',
        'tips' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];
}
