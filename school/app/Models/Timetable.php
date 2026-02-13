<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//  SchoolClass
 
class Timetable extends Model
{
    protected $fillable = [
        'academic_year_id',
        'class_id',
        'day_of_week',
        'period_id',
        'subject_id',
        'teacher_id',
        'room_id',
        'is_active',
        'notes',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /* ================= Relationships ================= */

 


    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }

    public function period()
    {
        return $this->belongsTo(Period::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teachers::class);
    }
public function weeks(){
    return $this->belongsTo(Week::class,  'day_of_week');
}
    
}
