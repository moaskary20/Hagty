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

    // Accessor لضمان عرض الصورة بشكل صحيح
    public function getMediaUrlAttribute($value)
    {
        if (!$value) {
            return null;
        }

        // إذا كان المسار يبدأ بـ http أو https، ارجعه كما هو
        if (str_starts_with($value, 'http')) {
            return $value;
        }

        // إذا كان المسار يبدأ بـ /، ارجعه كما هو
        if (str_starts_with($value, '/')) {
            return $value;
        }

        // وإلا، استخدم Storage::url
        return \Storage::url($value);
    }

    // Scope للإشعارات النشطة
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope للإشعارات المحددة زمنياً
    public function scopeCurrentlyActive($query)
    {
        $now = now();
        
        return $query->where('is_active', true)
                    ->where(function($q) use ($now) {
                        $q->whereNull('start_date')
                          ->orWhere('start_date', '<=', $now);
                    })
                    ->where(function($q) use ($now) {
                        $q->whereNull('end_date')
                          ->orWhere('end_date', '>=', $now);
                    });
    }
}