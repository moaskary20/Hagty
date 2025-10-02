<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForasyVideo extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id', 'title', 'video_url', 'description', 'thumbnail',
        'skip_after_seconds', 'is_sponsored', 'is_active', 'display_order',
    ];

    protected $casts = [
        'is_sponsored' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function job()
    {
        return $this->belongsTo(ForasyJob::class, 'job_id');
    }
}
