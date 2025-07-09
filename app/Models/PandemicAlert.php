<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PandemicAlert extends Model
{
    protected $fillable = [
        'title',
        'description',
        'alert_level',
        'content_type',
        'video_url',
        'infographic_image',
        'audio_message',
        'safety_procedures',
        'thumbnail',
        'status',
        'health_authority',
        'alert_date',
        'expiry_date',
        'target_areas'
    ];

    protected $casts = [
        'alert_date' => 'date',
        'expiry_date' => 'date',
    ];

    // Accessor للحصول على صورة مصغرة افتراضية
    public function getThumbnailUrlAttribute()
    {
        if ($this->thumbnail) {
            return asset('storage/' . $this->thumbnail);
        }
        
        // صورة افتراضية لتنبيهات الجوائح
        return 'data:image/svg+xml;base64,' . base64_encode('
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100">
                <rect width="100" height="100" fill="#fef3c7"/>
                <g fill="#dc2626">
                    <polygon points="50,10 60,30 40,30"/>
                    <rect x="47" y="32" width="6" height="20"/>
                    <circle cx="50" cy="60" r="3"/>
                    <path d="M20 75 L80 75 L75 85 L25 85 Z"/>
                </g>
                <text x="50" y="95" text-anchor="middle" font-family="Arial" font-size="8" fill="#dc2626">تنبيه</text>
            </svg>
        ');
    }

    // Accessor للحصول على رابط الإنفوجرافيك
    public function getInfographicUrlAttribute()
    {
        if ($this->infographic_image) {
            return asset('storage/' . $this->infographic_image);
        }
        return null;
    }

    // Accessor للحصول على رابط الصوت
    public function getAudioUrlAttribute()
    {
        if ($this->audio_message) {
            return asset('storage/' . $this->audio_message);
        }
        return null;
    }

    // Accessor للحصول على مستوى التنبيه بالعربية
    public function getAlertLevelArabicAttribute()
    {
        return match($this->alert_level) {
            'low' => 'منخفض',
            'medium' => 'متوسط',
            'high' => 'عالي',
            'critical' => 'حرج',
            default => 'غير محدد'
        };
    }

    // Accessor للحصول على نوع المحتوى بالعربية
    public function getContentTypeArabicAttribute()
    {
        return match($this->content_type) {
            'video' => 'فيديو',
            'infographic' => 'رسم بياني',
            'both' => 'فيديو ورسم بياني',
            default => 'غير محدد'
        };
    }

    // Accessor للحصول على حالة التنبيه بالعربية
    public function getStatusArabicAttribute()
    {
        return match($this->status) {
            'active' => 'نشط',
            'inactive' => 'غير نشط',
            default => 'غير محدد'
        };
    }

    // Accessor للحصول على حالة التنبيه حسب التاريخ
    public function getAlertStatusAttribute()
    {
        if ($this->expiry_date && $this->expiry_date->isPast()) {
            return 'منتهي الصلاحية';
        }
        
        if ($this->status === 'active') {
            return 'نشط';
        }
        
        return 'غير نشط';
    }

    // Accessor للحصول على لون مستوى التنبيه
    public function getAlertLevelColorAttribute()
    {
        return match($this->alert_level) {
            'low' => 'success',
            'medium' => 'warning',
            'high' => 'danger',
            'critical' => 'danger',
            default => 'gray'
        };
    }

    // Accessor للحصول على أيقونة مستوى التنبيه
    public function getAlertLevelIconAttribute()
    {
        return match($this->alert_level) {
            'low' => 'heroicon-o-information-circle',
            'medium' => 'heroicon-o-exclamation-triangle',
            'high' => 'heroicon-o-exclamation-circle',
            'critical' => 'heroicon-o-shield-exclamation',
            default => 'heroicon-o-bell'
        };
    }
}
