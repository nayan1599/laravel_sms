<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
 protected $fillable = [
        'user_id',
        'name',
        'email',
        'photo',
        'employee_id',
        'designation',
        'department',
        'qualification',
        'experience_years',
        'date_of_joining',
        'date_of_leaving',
        'subject_specialization',
        'salary',
        'employment_type',
        'blood_group',
        'emergency_contact_name',
        'emergency_contact_phone',
        'status',
    ];


    public function subjects()
{
    return $this->hasMany(Subject::class, 'teacher_id');
}

public function classes()
{
    return $this->hasMany(ClassModel::class, 'teacher_id');
}
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
