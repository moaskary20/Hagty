<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KidDoctor extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'doctor_name',
        'specialization',
        'phone',
        'email',
        'address',
        'clinic_name',
        'working_hours',
        'emergency_phone',
        'notes'
    ];
}
