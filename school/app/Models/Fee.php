<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;

  protected $fillable = [
    'student_id',
    'fee_type_id',
    'month_year',
    'amount_due',
    'amount_paid',
    'discount',
    'fine',
    'due_date',
    'payment_date',
    'payment_method',
    'transaction_id',
    'status',
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
    public function feeType()
    {
        return $this->belongsTo(FeeType::class);
    }
    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }
}
