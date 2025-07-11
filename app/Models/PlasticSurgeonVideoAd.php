<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class PlasticSurgeonVideoAd extends Model
{
    use HasFactory;
    protected $fillable = [
        'video_url', 'title', 'plastic_surgeon_id',
    ];
    public function surgeon() {
        return $this->belongsTo(PlasticSurgeon::class, 'plastic_surgeon_id');
    }
}
