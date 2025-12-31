<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
     protected $fillable = [
        'subject_name',
        'subject_code',
        'class_id',
        'type',
        'full_marks',
        'pass_marks',
        'practical_marks',
        'subject_teacher_id',
        'status',
    ];

 public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teachers::class, 'subject_teacher_id');
    }
}