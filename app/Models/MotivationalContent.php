<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class MotivationalContent extends Model {
    protected $table = 'motivational_content';
    protected $fillable = ['title', 'content', 'content_type', 'author', 'image', 'is_featured', 'is_active'];
    protected $casts = ['is_featured' => 'boolean', 'is_active' => 'boolean'];
}
