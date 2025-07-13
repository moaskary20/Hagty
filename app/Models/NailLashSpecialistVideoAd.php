<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class NailLashSpecialistVideoAd extends Model
{
    use HasFactory;
    protected $fillable = [
        'video_url', 'title', 'nail_lash_specialist_id',
    ];
    public function specialist() {
        return $this->belongsTo(NailLashSpecialist::class, 'nail_lash_specialist_id');
    }
}
