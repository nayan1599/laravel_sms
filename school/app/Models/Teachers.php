<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
   protected $fillable = [
    'user_id',

    // Basic Info
    'name',
    'email',
    'phone',
    'alternate_phone',
    'photo',

    // Employee Info
    'employee_id',
    'designation',
    'department',

    // Personal Info
    'gender',
    'date_of_birth',
    'blood_group',
    'national_id',
    'marital_status',

    // Qualification & Skills
    'qualification',
    'experience_years',
    'skills',
    'education',

    // Job Info
    'date_of_joining',
    'date_of_leaving',
    'subject_specialization',
    'salary',
    'last_increment_date',
    'employment_type',

    // Address
    'present_address',
    'permanent_address',

    // Emergency
    'emergency_contact_name',
    'emergency_contact_phone',

    // System
    'status',
    'remarks',
    'updated_by',
];

protected $casts = [
    'skills' => 'array',
    'education' => 'array',
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
