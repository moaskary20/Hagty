<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BabyDoctorTip extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_name',
        'doctor_specialization',
        'doctor_title',
        'title',
        'content',
        'medical_category',
        'urgency_level',
        'age_group',
        'doctor_image',
        'clinic_name',
        'contact_info',
        'symptoms',
        'warnings',
        'requires_consultation',
        'is_emergency',
        'is_active'
    ];

    protected $casts = [
        'symptoms' => 'array',
        'warnings' => 'array',
        'requires_consultation' => 'boolean',
        'is_emergency' => 'boolean',
        'is_active' => 'boolean'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeEmergency($query)
    {
        return $query->where('is_emergency', true);
    }

    public function scopeByDoctor($query, $doctorName)
    {
        return $query->where('doctor_name', $doctorName);
    }
}
