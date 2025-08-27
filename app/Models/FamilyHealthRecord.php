<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyHealthRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_name',
        'relationship',
        'birth_date',
        'blood_type',
        'chronic_diseases',
        'allergies',
        'current_medications',
        'family_doctor',
        'doctor_phone',
        'emergency_notes',
        'height',
        'weight',
        'insurance_company',
        'insurance_number',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'height' => 'decimal:2',
        'weight' => 'decimal:2',
    ];
}
