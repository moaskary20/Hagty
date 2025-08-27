<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeddingPhotographerPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'photographer_id',
        'name',
        'description',
        'price',
        'included_services',
        'duration_hours',
        'edited_photos_count',
        'edited_videos_count',
        'includes_album',
        'includes_usb',
        'is_active',
    ];

    protected $casts = [
        'included_services' => 'array',
        'price' => 'decimal:2',
        'includes_album' => 'boolean',
        'includes_usb' => 'boolean',
        'is_active' => 'boolean',
    ];

    // علاقة مع المصور
    public function photographer()
    {
        return $this->belongsTo(WeddingPhotographer::class, 'photographer_id');
    }
}
