<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BabyHealthRecord extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'baby_name',
        'birth_date',
        'gender',
        'weight',
        'height',
        'blood_type',
        'allergies',
        'medical_conditions',
        'vaccination_record',
        'notes'
    ];
    
    protected $casts = [
        'birth_date' => 'date',
        'vaccination_record' => 'array',
        'allergies' => 'array'
    ];
}
