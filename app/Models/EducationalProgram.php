<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class EducationalProgram extends Model {
    protected $fillable = ['program_name', 'description', 'category', 'duration_hours', 'price', 'instructor', 'level', 'image', 'website_url', 'is_featured', 'is_active'];
    protected $casts = ['is_featured' => 'boolean', 'is_active' => 'boolean', 'price' => 'decimal:2'];
}
