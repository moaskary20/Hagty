<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class SpaClinicVideoAd extends Model
{
    use HasFactory;
    protected $fillable = [
        'video_url', 'title', 'spa_clinic_id',
    ];
    public function clinic() {
        return $this->belongsTo(SpaClinic::class, 'spa_clinic_id');
    }
}
