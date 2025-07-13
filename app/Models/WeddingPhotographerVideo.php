<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeddingPhotographerVideo extends Model
{
    use HasFactory;

    protected $fillable = [
        'photographer_id',
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

    // علاقة مع المصور
    public function photographer()
    {
        return $this->belongsTo(WeddingPhotographer::class, 'photographer_id');
    }
}
