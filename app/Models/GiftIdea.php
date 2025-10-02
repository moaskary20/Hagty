<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class GiftIdea extends Model {
    protected $fillable = ['title', 'description', 'category', 'occasion', 'price_range_min', 'price_range_max', 'image', 'gallery_images', 'purchase_url', 'is_featured', 'is_active'];
    protected $casts = ['gallery_images' => 'array', 'is_featured' => 'boolean', 'is_active' => 'boolean', 'price_range_min' => 'decimal:2', 'price_range_max' => 'decimal:2'];
}
