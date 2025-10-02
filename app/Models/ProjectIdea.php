<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ProjectIdea extends Model {
    protected $fillable = ['title', 'description', 'category', 'difficulty_level', 'budget_range', 'target_audience', 'target_market', 'requirements', 'steps', 'expected_roi', 'key_features', 'image', 'is_featured', 'is_active'];
    protected $casts = ['is_featured' => 'boolean', 'is_active' => 'boolean'];
}
