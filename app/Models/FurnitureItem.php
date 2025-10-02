<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class FurnitureItem extends Model {
    protected $fillable = ['title', 'description', 'category', 'room_type', 'price', 'dimensions', 'material', 'color', 'image', 'gallery_images', 'shop_url', 'is_featured', 'is_active'];
    protected $casts = ['gallery_images' => 'array', 'is_featured' => 'boolean', 'is_active' => 'boolean', 'price' => 'decimal:2'];
}
