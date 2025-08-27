<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class HairStylistVideo extends Model {
    protected $fillable = [
        'hair_stylist_id', 'video_url'
    ];
    public function stylist() { return $this->belongsTo(HairStylist::class, 'hair_stylist_id'); }
}
