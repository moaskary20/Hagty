<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForasyBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id', 'title', 'banner_image', 'link_url', 'description',
        'offer_description', 'valid_until', 'display_order', 'is_active',
        'main_title', 'subtitle', 'button_text', 'button_url', 'text_position',
        'text_color', 'button_color', 'show_overlay'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'valid_until' => 'date',
    ];

    public function job()
    {
        return $this->belongsTo(ForasyJob::class, 'job_id');
    }
}
