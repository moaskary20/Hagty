<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignerBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'wedding_dress_designer_id',
        'banner_title',
        'banner_description',
        'banner_image',
        'banner_type',
        'link_url',
        'display_order',
        'is_active',
        'click_count',
        'view_count'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function designer()
    {
        return $this->belongsTo(WeddingDressDesigner::class, 'wedding_dress_designer_id');
    }
}
