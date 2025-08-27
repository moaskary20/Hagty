<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class SpaClinicTip extends Model
{
    use HasFactory;
    protected $fillable = [
        'spa_clinic_id', 'tip',
    ];
    public function clinic() {
        return $this->belongsTo(SpaClinic::class, 'spa_clinic_id');
    }
}
