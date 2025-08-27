<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class PlasticSurgeonTip extends Model
{
    use HasFactory;
    protected $fillable = [
        'plastic_surgeon_id', 'tip',
    ];
    public function surgeon() {
        return $this->belongsTo(PlasticSurgeon::class, 'plastic_surgeon_id');
    }
}
