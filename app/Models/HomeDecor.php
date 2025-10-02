<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class HomeDecor extends Model {
    protected $fillable = ['title', 'description', 'category', 'price', 'image', 'gallery_images', 'shop_url', 'seller_name', 'seller_phone', 'seller_email', 'seller_address', 'seller_whatsapp', 'seller_description', 'is_featured', 'is_active'];
    protected $casts = ['gallery_images' => 'array', 'is_featured' => 'boolean', 'is_active' => 'boolean', 'price' => 'decimal:2'];
}
