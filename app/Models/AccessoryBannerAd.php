<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessoryBannerAd extends Model
{
    use HasFactory;
    protected $table = 'إعلانات_بانر_الإكسسوارات';
    protected $fillable = [
        'عنوان_الإعلان',
        'صور_الإعلان',
        'رابط_الإعلان',
        'حالة_التفعيل',
        'تاريخ_الانتهاء',
        'نوع_الإعلان',
    ];
    protected $casts = [
        'صور_الإعلان' => 'array',
    ];
}
