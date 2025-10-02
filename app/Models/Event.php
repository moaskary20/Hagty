<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'event_type',
        'location',
        'google_maps_url',
        'event_date',
        'event_time',
        'duration_hours',
        'price',
        'max_attendees',
        'current_attendees',
        'organizer_name',
        'organizer_phone',
        'organizer_email',
        'image',
        'gallery_images',
        'facebook_url',
        'instagram_url',
        'website_url',
        'is_featured',
        'is_active',
        'terms_conditions',
    ];

    protected $casts = [
        'gallery_images' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'event_date' => 'datetime',
        'price' => 'decimal:2',
    ];

    // العلاقات
    public function bookings()
    {
        return $this->hasMany(EventBooking::class);
    }

    public function banners()
    {
        return $this->hasMany(EventBanner::class);
    }

    public function videos()
    {
        return $this->hasMany(EventVideo::class);
    }

    // الوظائف المساعدة
    public function isAvailable()
    {
        if (!$this->max_attendees) {
            return true;
        }
        return $this->current_attendees < $this->max_attendees;
    }

    public function availableSeats()
    {
        if (!$this->max_attendees) {
            return null;
        }
        return $this->max_attendees - $this->current_attendees;
    }
}
