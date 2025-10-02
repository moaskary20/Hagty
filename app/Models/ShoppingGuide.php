<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ShoppingGuide extends Model {
    protected $fillable = ['title', 'content', 'category', 'image', 'is_featured', 'is_active'];
    protected $casts = ['is_featured' => 'boolean', 'is_active' => 'boolean'];
}
