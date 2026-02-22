<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date_of_birth',
        'gender',
        'blood_group',
        'religion',
        'nationality',
        'birth_cert_no',
        'contact',
        'email',
        'present_address',
        'permanent_address',
        'father_name',
        'mother_name',
        'guardian_phone',
        'guardian_occupation',
        'class_id',
        'section_id',
        'roll',
        'previous_school',
        'last_exam_result',
        'admission_date',
        'residential_type',
        'remarks',
        'photo',
        'user_id', // Add this line
        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }
   public function bloodGroup()
    {
        return $this->belongsTo(BloodGroup::class, 'blood_group', 'name');
    }
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}