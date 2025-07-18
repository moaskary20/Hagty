<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Attendance extends Model {
    protected $fillable = [
        'student_id', 'course_id', 'session_date', 'present'
    ];
    public function student() { return $this->belongsTo(Student::class); }
    public function course() { return $this->belongsTo(Course::class); }
}
