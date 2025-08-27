<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaternityDoctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'specialty',
        'clinic_name',
        'clinic_address',
        'phone_numbers',
        'google_maps_url',
        'profile_image',
        'years_of_experience',
        'consultation_fees',
        'working_hours',
        'available_days',
        'rating',
        'description',
        'qualifications',
        'languages_spoken',
        'is_verified',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'phone_numbers' => 'array',
        'working_hours' => 'array',
        'available_days' => 'array',
        'qualifications' => 'array',
        'languages_spoken' => 'array',
        'is_verified' => 'boolean',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'rating' => 'decimal:1',
    ];

    public function checkupReminders()
    {
        return $this->hasMany(CheckupReminder::class);
    }

    public function deliveryAlerts()
    {
        return $this->hasMany(DeliveryAlert::class);
    }

    public function hospitalAssignments()
    {
        return $this->hasMany(HospitalAssignment::class);
    }
}
