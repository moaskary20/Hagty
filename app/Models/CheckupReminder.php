<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckupReminder extends Model
{
    use HasFactory;

    protected $fillable = [
        'maternity_doctor_id',
        'patient_name',
        'patient_phone',
        'checkup_date',
        'checkup_time',
        'reminder_date',
        'reminder_time',
        'checkup_type',
        'notes',
        'is_completed',
        'is_active',
    ];

    protected $casts = [
        'checkup_date' => 'date',
        'reminder_date' => 'date',
        'is_completed' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function doctor()
    {
        return $this->belongsTo(MaternityDoctor::class, 'maternity_doctor_id');
    }
}
