<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class DesignIdea extends Model {
    protected $fillable = ['title', 'content', 'category', 'room_type', 'style', 'image', 'gallery_images', 'is_featured', 'is_active'];
    protected $casts = ['gallery_images' => 'array', 'is_featured' => 'boolean', 'is_active' => 'boolean'];
}
