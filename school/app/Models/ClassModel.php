<?php

namespace App\Models;
use App\Models\Teachers;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    

    protected $table = 'classes';  // স্পষ্ট করে দিলাম

    protected $fillable = [
        'class_name',
        'class_numeric',
        'class_code',
        'medium',
        'shift',
        'class_teacher_id',
        'status',
    ];
  public function teacher()
{
    return $this->belongsTo(Teachers::class, 'class_teacher_id');
}
  
public function fees()
{
    return $this->hasMany(Fee::class);
}

}
