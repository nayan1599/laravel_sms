<?php

namespace App\Models;
 
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentApplication extends Model
{
        use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'gender',
        'class_id',
        'section_id',
        'father_name',
        'mother_name',
        'date_of_birth',
        'address',
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
