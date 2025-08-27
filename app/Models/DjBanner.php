<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DjBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'dj_performer_id',
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

    // علاقة مع مشغل الدي جي
    public function djPerformer()
    {
        return $this->belongsTo(DjPerformer::class);
    }
}
