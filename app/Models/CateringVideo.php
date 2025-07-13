<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CateringVideo extends Model
{
    use HasFactory;

    protected $fillable = [
        'catering_service_id',
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

    // علاقة مع شركة خدمات الطعام
    public function cateringService()
    {
        return $this->belongsTo(CateringService::class);
    }
}
