<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class NailLashSpecialistTip extends Model
{
    use HasFactory;
    protected $fillable = [
        'nail_lash_specialist_id', 'tip',
    ];
    public function specialist() {
        return $this->belongsTo(NailLashSpecialist::class, 'nail_lash_specialist_id');
    }
}
