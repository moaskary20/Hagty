<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HealthTip extends Model
{
    protected $fillable = [
        'title',
        'description',
        'type',
        'content_type',
        'content',
        'youtube_video_id',
        'image',
        'doctor_id',
        'is_active',
        'views_count'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'views_count' => 'integer',
    ];

    // العلاقة مع الطبيب
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    // Accessor للحصول على صورة افتراضية
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        
        // صورة افتراضية للنصيحة الصحية
        return 'data:image/svg+xml;base64,' . base64_encode('
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100">
                <rect width="100" height="100" fill="#f0f9ff"/>
                <g fill="#e91e63">
                    <circle cx="50" cy="35" r="15"/>
                    <rect x="40" y="50" width="20" height="8" rx="4"/>
                    <rect x="35" y="62" width="30" height="4" rx="2"/>
                    <rect x="30" y="70" width="40" height="4" rx="2"/>
                    <rect x="38" y="78" width="24" height="4" rx="2"/>
                </g>
                <text x="50" y="95" text-anchor="middle" font-family="Arial" font-size="8" fill="#e91e63">نصيحة صحية</text>
            </svg>
        ');
    }

    // Accessor للحصول على رابط اليوتيوب
    public function getYoutubeUrlAttribute()
    {
        if ($this->youtube_video_id) {
            return 'https://www.youtube.com/watch?v=' . $this->youtube_video_id;
        }
        return null;
    }

    // Accessor للحصول على رابط الصورة المصغرة لليوتيوب
    public function getYoutubeThumbnailAttribute()
    {
        if ($this->youtube_video_id) {
            return 'https://img.youtube.com/vi/' . $this->youtube_video_id . '/maxresdefault.jpg';
        }
        return null;
    }

    // Accessor لنوع النصيحة
    public function getTypeTextAttribute()
    {
        return match($this->type) {
            'doctor_sponsored' => 'مدعومة من طبيب',
            'generic' => 'عامة',
            default => 'غير محدد'
        };
    }

    // Accessor لنوع المحتوى
    public function getContentTypeTextAttribute()
    {
        return match($this->content_type) {
            'text' => 'نص',
            'video' => 'فيديو',
            'youtube_link' => 'رابط يوتيوب',
            default => 'غير محدد'
        };
    }

    // Scope للنصائح النشطة
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope للنصائح المدعومة من الأطباء
    public function scopeDoctorSponsored($query)
    {
        return $query->where('type', 'doctor_sponsored');
    }

    // Scope للنصائح العامة
    public function scopeGeneric($query)
    {
        return $query->where('type', 'generic');
    }
}
