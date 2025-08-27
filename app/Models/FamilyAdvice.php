<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyAdvice extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'content',
        'expert_name',
        'expert_credentials',
        'contact_info',
        'video_url',
        'category',
        'target_audience',
        'duration_minutes',
        'rating',
        'is_featured',
    ];

    protected $casts = [
        'duration_minutes' => 'integer',
        'rating' => 'decimal:1',
        'is_featured' => 'boolean',
    ];
}
