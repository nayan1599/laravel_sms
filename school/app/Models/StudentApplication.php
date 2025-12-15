<?php

namespace App\Models;
 
 

use Illuminate\Database\Eloquent\Model;

class StudentApplication extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'gender',
        'class_id',
        'section_id',
        'father_name',
        'photo',
        'status'
    ];

    // ✅ Class Relation
   public function studentClass()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }


    // ✅ Section Relation
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}
