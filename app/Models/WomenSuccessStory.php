<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class WomenSuccessStory extends Model {
    protected $fillable = ['title', 'story', 'woman_name', 'achievement', 'field', 'image', 'is_featured', 'is_active'];
    protected $casts = ['is_featured' => 'boolean', 'is_active' => 'boolean'];
}
