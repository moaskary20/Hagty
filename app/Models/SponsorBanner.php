<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SponsorBanner extends Model
{
    protected $fillable = [
        'title', 'image', 'link_url', 'start_date', 'end_date', 'is_active', 'display_order',
        'main_title', 'subtitle', 'button_text', 'text_position', 'text_color', 'button_color', 'show_overlay'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'show_overlay' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)
            ->where(function($q){
                $q->whereNull('start_date')->orWhere('start_date', '<=', now());
            })
            ->where(function($q){
                $q->whereNull('end_date')->orWhere('end_date', '>=', now());
            });
    }
}
