<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryAlert extends Model
{
    use HasFactory;

    protected $fillable = [
        'maternity_doctor_id',
        'patient_name',
        'patient_phone',
        'delivery_date',
        'alert_before_days',
        'hospital_name',
        'hospital_address',
        'hospital_phone',
        'emergency_contact_name',
        'emergency_contact_phone',
        'special_notes',
        'is_completed',
        'is_active',
    ];

    protected $casts = [
        'delivery_date' => 'date',
        'alert_before_days' => 'integer',
        'is_completed' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function doctor()
    {
        return $this->belongsTo(MaternityDoctor::class, 'maternity_doctor_id');
    }
}
