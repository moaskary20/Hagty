<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Exam extends Model {
    protected $fillable = [
        'course_id', 'title', 'type', 'questions'
    ];
    public function course() { return $this->belongsTo(Course::class); }
    public function results() { return $this->hasMany(ExamResult::class); }
}
