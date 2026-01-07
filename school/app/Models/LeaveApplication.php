<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveApplication extends Model
{
    protected $fillable = [
        'student_id',
        'class_id',
        'teacher_id',
        'from_date',
        'to_date',
        'reason',
        'status',
        'approved_by'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
