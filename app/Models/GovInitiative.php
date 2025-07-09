<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GovInitiative extends Model
{
    protected $fillable = [
        'title',
        'description',
        'content_type',
        'video_url',
        'infographic_image',
        'thumbnail',
        'status',
        'government_entity',
        'launch_date',
        'target_audience'
    ];

    protected $casts = [
        'launch_date' => 'date',
    ];

    // Accessor للحصول على صورة مصغرة افتراضية
    public function getThumbnailUrlAttribute()
    {
        if ($this->thumbnail) {
            return asset('storage/' . $this->thumbnail);
        }
        
        // صورة افتراضية للمبادرات الحكومية
        return 'data:image/svg+xml;base64,' . base64_encode('
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100">
                <rect width="100" height="100" fill="#f0f9ff"/>
                <g fill="#e91e63">
                    <rect x="20" y="20" width="60" height="8"/>
                    <rect x="20" y="35" width="50" height="6"/>
                    <rect x="20" y="48" width="55" height="6"/>
                    <rect x="20" y="61" width="45" height="6"/>
                    <circle cx="50" cy="80" r="8"/>
                </g>
                <text x="50" y="95" text-anchor="middle" font-family="Arial" font-size="8" fill="#e91e63">مبادرة</text>
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

    // Accessor للحصول على نوع المحتوى بالعربية
    public function getContentTypeArabicAttribute()
    {
        return match($this->content_type) {
            'video' => 'فيديو',
            'infographic' => 'إنفوجرافيك',
            'both' => 'فيديو وإنفوجرافيك',
            default => 'غير محدد'
        };
    }

    // Accessor للحصول على حالة المبادرة بالعربية
    public function getStatusArabicAttribute()
    {
        return match($this->status) {
            'active' => 'نشطة',
            'inactive' => 'غير نشطة',
            default => 'غير محدد'
        };
    }
}
