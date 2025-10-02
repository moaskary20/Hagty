<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PopupNotification extends Model
{
    protected $fillable = [
        'title',
        'content',
        'type',
        'media_url',
        'button_text',
        'button_url',
        'show_button',
        'is_active',
        'start_date',
        'end_date',
        'display_delay',
        'display_duration'
    ];

    protected $casts = [
        'show_button' => 'boolean',
        'is_active' => 'boolean',
        'start_date' => 'datetime',
        'end_date' => 'datetime'
    ];

    public function isCurrentlyActive()
    {
        if (!$this->is_active) {
            return false;
        }

        $now = now();
        
        if ($this->start_date && $now->lt($this->start_date)) {
            return false;
        }
        
        if ($this->end_date && $now->gt($this->end_date)) {
            return false;
        }
        
        return true;
    }
}