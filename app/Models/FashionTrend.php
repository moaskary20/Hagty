<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FashionTrend extends Model
{
    use HasFactory;
    protected $table = 'صيحات_الموضة';
    protected $fillable = [
        'العنوان',
        'الوصف',
        'الصورة',
        'النوع',
        'رابط_الفيديو',
        'حالة_التفعيل',
        'تاريخ_النشر',
        'category_id', // إضافة مفتاح القسم إذا لم يكن موجودًا
    ];

    public function category()
    {
        return $this->belongsTo(FashionTrendCategory::class, 'category_id');
    }

    public function videos()
    {
        return $this->hasMany(FashionTrendVideo::class, 'trend_id');
    }
}
