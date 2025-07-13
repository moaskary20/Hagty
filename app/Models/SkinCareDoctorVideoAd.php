<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class SkinCareDoctorVideoAd extends Model
{
    use HasFactory;
    protected $fillable = [
        'video_url', 'title', 'skin_care_doctor_id',
    ];
    public function doctor() {
        return $this->belongsTo(SkinCareDoctor::class, 'skin_care_doctor_id');
    }
}
