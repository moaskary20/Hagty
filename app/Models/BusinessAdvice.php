<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class BusinessAdvice extends Model {
    protected $table = 'business_advice';
    protected $fillable = ['title', 'content', 'category', 'author', 'image', 'is_featured', 'is_active'];
    protected $casts = ['is_featured' => 'boolean', 'is_active' => 'boolean'];
}
