<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingVideo extends Model
{
    use HasFactory;
    protected $table = 'training_videos';
    protected $fillable = [
        'عنوان_الفيديو',
        'وصف_الفيديو',
        'رابط_الفيديو',
        'صورة_الغلاف',
        'التصنيف',
        'النوع',
    ];
}
