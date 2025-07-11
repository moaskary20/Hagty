<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponsorVideo extends Model
{
    use HasFactory;
    protected $table = 'فيديوهات_الراعي';
    protected $fillable = [
        'عنوان_الفيديو',
        'ملف_الفيديو',
        'رابط_التحويل',
        'حالة_التفعيل',
        'تاريخ_الانتهاء',
    ];
}
