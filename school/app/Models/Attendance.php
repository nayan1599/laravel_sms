<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\ClassModel;
use App\Models\Subject;
class Attendance extends Model

{
    protected $fillable = [
        'student_id', 'class_id', 'section_id', 'subject_id',
        'attendance_date', 'status', 'remarks',
        'recorded_by', 'recorded_at'
    ];

    public $timestamps = false;

    public function student() {
        return $this->belongsTo(Student::class);
    }

    public function class() {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }

    public function section() {
        return $this->belongsTo(Section::class);
    }

    // public function subject() {
    //     return $this->belongsTo(Subject::class);
    // }

    public function recordedBy() {
        return $this->belongsTo(User::class, 'recorded_by');
    }
}