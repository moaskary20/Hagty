<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Student extends Model {
    protected $fillable = [
        'name', 'email', 'phone', 'course_id'
    ];
    public function course() { return $this->belongsTo(Course::class); }
    public function attendances() { return $this->hasMany(Attendance::class); }
    public function examResults() { return $this->hasMany(ExamResult::class); }
}
