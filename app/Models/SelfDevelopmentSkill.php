<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class SelfDevelopmentSkill extends Model {
    protected $fillable = ['skill_name', 'description', 'category', 'difficulty_level', 'key_points', 'steps', 'image', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];
}
