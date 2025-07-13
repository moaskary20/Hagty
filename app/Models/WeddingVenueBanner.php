<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeddingVenueBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'wedding_venue_id',
        'title',
        'banner_image',
        'link_url',
        'offer_description',
        'valid_until',
        'is_active',
    ];

    protected $casts = [
        'valid_until' => 'date',
        'is_active' => 'boolean',
    ];

    // علاقة مع الفندق
    public function venue()
    {
        return $this->belongsTo(WeddingVenue::class, 'wedding_venue_id');
    }
}
