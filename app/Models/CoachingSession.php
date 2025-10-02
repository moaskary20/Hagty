<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class CoachingSession extends Model {
    protected $fillable = ['session_title', 'description', 'topic', 'coach_name', 'session_date', 'duration_minutes', 'session_type', 'audio_url', 'image', 'is_featured', 'is_active'];
    protected $casts = [
        'is_featured' => 'boolean', 
        'is_active' => 'boolean',
        'session_date' => 'datetime',
    ];
}
