<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class BeautyShopBanner extends Model {
    protected $fillable = [
        'beauty_shop_id', 'image', 'link'
    ];
    public function shop() { return $this->belongsTo(BeautyShop::class, 'beauty_shop_id'); }
}
