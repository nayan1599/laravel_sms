<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherAttendance extends Model
{
    //
  protected $fillable = [
    'teacher_id',
    'attendance_date',
    'status'
];
    public function teacher()
    {
        return $this->belongsTo(Teachers::class, 'teacher_id');
    }
}
