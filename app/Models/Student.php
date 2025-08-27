<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Student extends Model 
{
    protected $fillable = [
        'name',
        'last_name', 
        'email', 
        'phone', 
        'age',
        'city',
        'education_level',
        'experience_level',
        'goals',
        'course_id',
        'registration_date',
        'status'
    ];

    protected $casts = [
        'registration_date' => 'datetime',
        'age' => 'integer',
    ];

    public function course() 
    { 
        return $this->belongsTo(Course::class); 
    }

    public function attendances() 
    { 
        return $this->hasMany(Attendance::class); 
    }

    public function examResults() 
    { 
        return $this->hasMany(ExamResult::class); 
    }

    // Accessor for full name
    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->last_name;
    }
}
