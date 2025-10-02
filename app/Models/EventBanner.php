<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'title',
        'banner_image',
        'link_url',
        'description',
        'offer_description',
        'valid_until',
        'display_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'valid_until' => 'date',
    ];

    // العلاقات
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
