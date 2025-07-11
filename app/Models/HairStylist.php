<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class HairStylist extends Model {
    protected $fillable = [
        'name', 'works_images', 'location', 'phone', 'profile_url'
    ];
    protected $casts = [
        'works_images' => 'array',
    ];
    public function videos() { return $this->hasMany(HairStylistVideo::class); }
}
