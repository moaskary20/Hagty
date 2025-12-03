<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MotherhoodGuide extends Model
{
    protected $fillable = [
        'title',
        'content',
        'category',
        'age_range',
        'featured_image',
        'tips',
        'views_count',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'tips' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];
}
