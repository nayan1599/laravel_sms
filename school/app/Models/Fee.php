<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'class_id',
        'fee_type',
        'amount',
        'due_date',
        'payment_date',
        'payment_status',
        'paid_amount',
        'receipt_number',
        'remarks',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function class()
    {
        return $this->belongsTo(ClassModel::class);  // Assuming your class model name is ClassModel
    }
}
