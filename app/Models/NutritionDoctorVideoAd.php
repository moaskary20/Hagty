<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class NutritionDoctorVideoAd extends Model
{
    use HasFactory;
    protected $fillable = [
        'video_url', 'title', 'nutrition_doctor_id',
    ];
    public function doctor() {
        return $this->belongsTo(NutritionDoctor::class, 'nutrition_doctor_id');
    }
}
