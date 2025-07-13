<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignerVideoAd extends Model
{
    use HasFactory;

    protected $fillable = [
        'wedding_dress_designer_id',
        'sponsor_name',
        'sponsor_logo',
        'ad_title',
        'ad_description',
        'video_url',
        'video_file',
        'thumbnail_image',
        'sponsor_website',
        'sponsor_contact',
        'display_duration',
        'start_date',
        'end_date',
        'click_count',
        'view_count',
        'is_active',
        'priority_order'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_active' => 'boolean'
    ];

    public function designer()
    {
        return $this->belongsTo(WeddingDressDesigner::class, 'wedding_dress_designer_id');
    }
}
