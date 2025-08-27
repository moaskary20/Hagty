<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Course extends Model {
    protected $fillable = [
        'name', 'description', 'duration', 'instructor', 'max_students'
    ];
    public function students() { return $this->hasMany(Student::class); }
    public function contents() { return $this->hasMany(CourseContent::class); }
    public function attendances() { return $this->hasMany(Attendance::class); }
    public function exams() { return $this->hasMany(Exam::class); }
    public function certificates() { return $this->hasMany(Certificate::class); }
}
