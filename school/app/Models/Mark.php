<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    //
        protected $fillable = [
        'student_id', 'exam_id', 'subject_id',
        'marks_obtained', 'total_marks', 'grade', 'remarks',
        'recorded_by', 'recorded_at'
    ];
}
