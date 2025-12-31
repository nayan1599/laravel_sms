<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
 protected $fillable = [
        'user_id',
        'name',
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
}
