<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessoratySponsorVideo extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'video_url',
        'thumbnail',
        'duration',
        'skip_after_seconds',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'skip_after_seconds' => 'integer',
    ];
}
