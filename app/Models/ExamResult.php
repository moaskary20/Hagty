<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ExamResult extends Model {
    protected $fillable = [
        'exam_id', 'student_id', 'score', 'passed'
    ];
    public function exam() { return $this->belongsTo(Exam::class); }
    public function student() { return $this->belongsTo(Student::class); }
}
