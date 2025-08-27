<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeddingPhotographerBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'photographer_id',
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

    // علاقة مع المصور
    public function photographer()
    {
        return $this->belongsTo(WeddingPhotographer::class, 'photographer_id');
    }
}
