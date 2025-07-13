<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CateringBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'catering_service_id',
        'title',
        'banner_image',
        'link_url',
        'offer_description',
        'valid_until',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'valid_until' => 'date',
    ];

    // علاقة مع شركة خدمات الطعام
    public function cateringService()
    {
        return $this->belongsTo(CateringService::class);
    }
}
