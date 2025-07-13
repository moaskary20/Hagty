<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlowerSponsorBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'flower_decorator_id',
        'title',
        'banner_image',
        'sponsor_company',
        'link_url',
        'offer_description',
        'valid_until',
        'is_sponsored',
        'is_active',
    ];

    protected $casts = [
        'is_sponsored' => 'boolean',
        'is_active' => 'boolean',
        'valid_until' => 'date',
    ];

    // علاقة مع مورد الديكورات
    public function flowerDecorator()
    {
        return $this->belongsTo(FlowerDecorator::class);
    }
}
