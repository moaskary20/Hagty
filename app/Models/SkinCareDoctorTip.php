<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class SkinCareDoctorTip extends Model
{
    use HasFactory;
    protected $fillable = [
        'skin_care_doctor_id', 'tip',
    ];
    public function doctor() {
        return $this->belongsTo(SkinCareDoctor::class, 'skin_care_doctor_id');
    }
}
