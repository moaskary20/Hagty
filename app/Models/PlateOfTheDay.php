<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlateOfTheDay extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'steps',
        'main_image',
        'gallery',
        'video_url',
        'status',
    ];

    protected $casts = [
        'steps' => 'array',
        'gallery' => 'array',
    ];
}
