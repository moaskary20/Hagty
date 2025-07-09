<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $fillable = [
        'name',
        'specialty',
        'address',
        'emergency_numbers',
        'phone',
        'google_maps_link',
        'booking_link',
        'image'
    ];

    protected $casts = [
        'emergency_numbers' => 'array',
    ];

    // Accessor للحصول على أرقام الطوارئ كـ array
    public function getEmergencyNumbersAttribute($value)
    {
        if (is_string($value)) {
            return json_decode($value, true) ?? [];
        }
        return $value ?? [];
    }

    // Accessor للحصول على صورة افتراضية
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        
        // صورة افتراضية للمستشفى
        return 'data:image/svg+xml;base64,' . base64_encode('
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100">
                <rect width="100" height="100" fill="#f8d7da"/>
                <g fill="#e91e63">
                    <rect x="35" y="15" width="30" height="70"/>
                    <rect x="15" y="35" width="70" height="30"/>
                </g>
                <text x="50" y="90" text-anchor="middle" font-family="Arial" font-size="10" fill="#e91e63">مستشفى</text>
            </svg>
        ');
    }
}
