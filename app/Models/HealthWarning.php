<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthWarning extends Model
{
    use HasFactory;

    protected $fillable = [
        'weekly_baby_care_id',
        'warning_type',
        'title',
        'description',
        'forbidden_items',
        'risk_level',
        'symptoms_to_watch',
        'what_to_do',
        'when_to_call_doctor',
        'prevention_tips',
        'images',
        'is_critical',
        'is_active',
    ];

    protected $casts = [
        'forbidden_items' => 'array',
        'symptoms_to_watch' => 'array',
        'what_to_do' => 'array',
        'when_to_call_doctor' => 'array',
        'prevention_tips' => 'array',
        'images' => 'array',
        'is_critical' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function weeklyBabyCare()
    {
        return $this->belongsTo(WeeklyBabyCare::class);
    }
}
