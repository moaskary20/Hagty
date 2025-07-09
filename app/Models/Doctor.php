<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'specialty',
        'clinic_address',
        'phone',
        'google_maps_url',
        'booking_url',
        'image',
    ];

    protected $casts = [
        'phone' => 'array',
    ];

    // Accessor للصورة
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            $imagePath = storage_path('app/public/' . $this->image);
            if (file_exists($imagePath)) {
                return asset('storage/' . $this->image);
            }
        }
        return asset('images/default-doctor.svg');
    }

    // Accessor للاسم الكامل
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    // Helper للتحقق من وجود الصورة
    public function hasImage()
    {
        if (!$this->image) {
            return false;
        }
        
        $imagePath = storage_path('app/public/' . $this->image);
        return file_exists($imagePath);
    }
}
