<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeddingVenueVideo extends Model
{
    use HasFactory;

    protected $fillable = [
        'wedding_venue_id',
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

    // علاقة مع الفندق
    public function venue()
    {
        return $this->belongsTo(WeddingVenue::class, 'wedding_venue_id');
    }
}
