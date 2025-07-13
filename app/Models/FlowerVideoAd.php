<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlowerVideoAd extends Model
{
    use HasFactory;

    protected $fillable = [
        'flower_decorator_id',
        'title',
        'video_url',
        'description',
        'skip_after_seconds',
        'is_sponsored',
        'is_active',
    ];

    protected $casts = [
        'is_sponsored' => 'boolean',
        'is_active' => 'boolean',
    ];

    // علاقة مع مورد الديكورات
    public function flowerDecorator()
    {
        return $this->belongsTo(FlowerDecorator::class);
    }
}
