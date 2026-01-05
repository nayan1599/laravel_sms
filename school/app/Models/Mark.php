<?php

// app/Models/Mark.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;


    use HasFactory;

    public $timestamps = false; // ✅ Laravel যেন created_at / updated_at না খোঁজে

    protected $fillable = [
        'student_id',
        'exam_id',
        'subject_id',
        'marks_obtained',
        'total_marks',
        'grade',
        'remarks',
        'created_at',
        
    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

 
}
