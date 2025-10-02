<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class RiadatyExerciseVideo extends Model {
    protected $fillable = ['title', 'video_url', 'description', 'exercise_type', 'duration_minutes', 'difficulty_level', 'thumbnail', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];
}
