<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class RiadatyWorkout extends Model {
    protected $fillable = ['title', 'description', 'workout_type', 'duration_minutes', 'difficulty_level', 'calories_burned', 'image', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];
}
