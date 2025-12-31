<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
  protected $fillable = [
        'user_id',
        'national_id',
        'relation',
        'occupation',
        'education_level',
        'income_range',
        'address',
        'emergency_contact',
        'status',
    ];
    public function students()
{
    return $this->belongsToMany(Student::class, 'student_guardian')
                ->withPivot('relation')
                ->withTimestamps();
}
}
