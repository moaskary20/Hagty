<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventVideo extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'title',
        'video_url',
        'description',
        'thumbnail',
        'skip_after_seconds',
        'is_sponsored',
        'is_active',
        'display_order',
    ];

    protected $casts = [
        'is_sponsored' => 'boolean',
        'is_active' => 'boolean',
    ];

    // العلاقات
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
