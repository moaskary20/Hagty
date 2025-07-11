<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class BeautyShop extends Model {
    protected $fillable = [
        'brand_name', 'location', 'shop_url'
    ];
    public function banners() { return $this->hasMany(BeautyShopBanner::class); }
    public function videos() { return $this->hasMany(BeautyShopVideo::class); }
}
