<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    protected $fillable = [
        'name',
        'address',
        'phone',
        'google_maps_link',
        'online_order_link',
        'image'
    ];

    // Accessor للحصول على صورة افتراضية
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        
        // صورة افتراضية للصيدلية
        return 'data:image/svg+xml;base64,' . base64_encode('
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100">
                <rect width="100" height="100" fill="#e8f5e8"/>
                <g fill="#4caf50">
                    <rect x="35" y="15" width="30" height="70"/>
                    <rect x="15" y="35" width="70" height="30"/>
                    <circle cx="25" cy="25" r="8"/>
                    <circle cx="75" cy="25" r="8"/>
                    <circle cx="25" cy="75" r="8"/>
                    <circle cx="75" cy="75" r="8"/>
                </g>
                <text x="50" y="90" text-anchor="middle" font-family="Arial" font-size="10" fill="#4caf50">صيدلية</text>
            </svg>
        ');
    }
}
