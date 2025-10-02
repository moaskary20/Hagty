<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class LeadershipSkill extends Model {
    protected $fillable = ['skill_name', 'description', 'category', 'learning_points', 'image', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];
}
