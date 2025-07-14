<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeTheChef extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'description',
        'video_url',
        'image',
        'status',
        'is_online',
        'tips',
    ];

    protected $casts = [
        'tips' => 'array',
        'is_online' => 'boolean',
    ];
}
