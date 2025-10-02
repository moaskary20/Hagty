<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class RiadatyPlan extends Model {
    protected $fillable = ['plan_name', 'description', 'plan_type', 'duration_weeks', 'schedule_details', 'difficulty_level', 'is_featured', 'is_active'];
    protected $casts = ['is_featured' => 'boolean', 'is_active' => 'boolean'];
}
