<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class NutritionDoctorTip extends Model
{
    use HasFactory;
    protected $fillable = [
        'nutrition_doctor_id', 'tip',
    ];
    public function doctor() {
        return $this->belongsTo(NutritionDoctor::class, 'nutrition_doctor_id');
    }
}
