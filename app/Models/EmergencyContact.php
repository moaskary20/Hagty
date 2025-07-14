<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyContact extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'contact_name',
        'relationship',
        'phone',
        'emergency_phone',
        'address',
        'is_primary',
        'notes'
    ];
    
    protected $casts = [
        'is_primary' => 'boolean'
    ];
}
