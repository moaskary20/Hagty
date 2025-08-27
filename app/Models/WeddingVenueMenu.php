<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeddingVenueMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'wedding_venue_id',
        'menu_name',
        'menu_type',
        'description',
        'menu_items',
        'price_per_person',
        'menu_image',
        'is_active',
    ];

    protected $casts = [
        'menu_items' => 'array',
        'price_per_person' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    // علاقة مع الفندق
    public function venue()
    {
        return $this->belongsTo(WeddingVenue::class, 'wedding_venue_id');
    }

    // علاقة مع الباقات
    public function packages()
    {
        return $this->belongsToMany(WeddingVenuePackage::class, 'package_menu', 'menu_id', 'package_id');
    }

    // دالة للحصول على نوع القائمة بالعربية
    public function getMenuTypeArabicAttribute()
    {
        $types = [
            'appetizers' => 'المقبلات',
            'main_courses' => 'الأطباق الرئيسية',
            'desserts' => 'الحلويات',
            'beverages' => 'المشروبات',
            'custom' => 'مخصص'
        ];

        return $types[$this->menu_type] ?? $this->menu_type;
    }
}
