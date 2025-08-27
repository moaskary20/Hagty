<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DjVideoAd extends Model
{
    use HasFactory;

    protected $fillable = [
        'dj_performer_id',
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

    // علاقة مع مشغل الدي جي
    public function djPerformer()
    {
        return $this->belongsTo(DjPerformer::class);
    }
}
