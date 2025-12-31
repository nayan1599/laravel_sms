<?php

namespace App\Models;
use HasFactory;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    

    protected $fillable = [
        'class_id',
        'section_name',
        'section_capacity',
        'section_teacher_id',
        'status',
    ];

    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teachers::class, 'section_teacher_id');
    }

    
}
