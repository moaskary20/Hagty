<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeddingVenuePackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'wedding_venue_id',
        'package_name',
        'package_type',
        'description',
        'included_services',
        'menu_ids',
        'price_per_person',
        'discount_percentage',
        'min_guests',
        'max_guests',
        'package_image',
        'valid_from',
        'valid_until',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'included_services' => 'array',
        'menu_ids' => 'array',
        'price_per_person' => 'decimal:2',
        'discount_percentage' => 'decimal:2',
        'valid_from' => 'date',
        'valid_until' => 'date',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    // علاقة مع الفندق
    public function venue()
    {
        return $this->belongsTo(WeddingVenue::class, 'wedding_venue_id');
    }

    // علاقة مع قوائم الطعام
    public function menus()
    {
        return $this->belongsToMany(WeddingVenueMenu::class, 'package_menu', 'package_id', 'menu_id');
    }

    // دالة للحصول على نوع الباقة بالعربية
    public function getPackageTypeArabicAttribute()
    {
        $types = [
            'bronze' => 'برونزية',
            'silver' => 'فضية',
            'gold' => 'ذهبية',
            'platinum' => 'بلاتينية',
            'custom' => 'مخصصة'
        ];

        return $types[$this->package_type] ?? $this->package_type;
    }

    // حساب السعر بعد الخصم
    public function getFinalPriceAttribute()
    {
        $discount = ($this->price_per_person * $this->discount_percentage) / 100;
        return $this->price_per_person - $discount;
    }

    // التحقق من صلاحية الباقة
    public function getIsValidAttribute()
    {
        $now = now()->toDateString();
        
        if ($this->valid_from && $this->valid_from > $now) {
            return false;
        }
        
        if ($this->valid_until && $this->valid_until < $now) {
            return false;
        }
        
        return true;
    }
}
