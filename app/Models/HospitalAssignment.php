<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalAssignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'maternity_doctor_id',
        'hospital_name',
        'hospital_address',
        'hospital_phone',
        'hospital_website',
        'google_maps_url',
        'emergency_number',
        'visiting_hours',
        'facilities',
        'room_types',
        'is_primary',
        'is_active',
    ];

    protected $casts = [
        'visiting_hours' => 'array',
        'facilities' => 'array',
        'room_types' => 'array',
        'is_primary' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function doctor()
    {
        return $this->belongsTo(MaternityDoctor::class, 'maternity_doctor_id');
    }
}
