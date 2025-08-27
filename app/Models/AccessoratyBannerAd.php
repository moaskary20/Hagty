<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessoratyBannerAd extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description', 
        'image',
        'link',
        'location',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
