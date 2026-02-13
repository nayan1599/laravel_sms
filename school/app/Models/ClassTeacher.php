<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassTeacher extends Model
{
 

    protected $fillable = [
        'class_id',
        'section_id',
        'teacher_id',
        'academic_year',
        'is_active'
    ];

    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teachers::class);
    }
}
