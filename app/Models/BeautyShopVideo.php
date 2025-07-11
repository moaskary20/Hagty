<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class BeautyShopVideo extends Model {
    protected $fillable = [
        'beauty_shop_id', 'video_url', 'skip_after_seconds'
    ];
    public function shop() { return $this->belongsTo(BeautyShop::class, 'beauty_shop_id'); }
}
