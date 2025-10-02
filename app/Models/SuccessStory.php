<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class SuccessStory extends Model {
    protected $fillable = ['title', 'story', 'person_name', 'achievement', 'lessons_learned', 'category', 'image', 'is_featured', 'is_active'];
    protected $casts = ['is_featured' => 'boolean', 'is_active' => 'boolean'];
}
