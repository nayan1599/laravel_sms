<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class LeaveApplication extends Model
{

    protected $table = 'leave_applications';

    /**
     * Mass assignable fields
     */
    protected $fillable = [
        'student_id',
        'teacher_id',
        'leave_type',
        'reason',
        'start_date',
        'end_date',
        'total_days',
        'status',
        'teacher_remark',
        'applied_at',
        'approved_at',
    ];

    /**
     * Date casting
     */
    protected $casts = [
        'start_date'  => 'date',
        'end_date'    => 'date',
        'applied_at'  => 'datetime',
        'approved_at' => 'datetime',
    ];

    /**
     * Relationships
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teachers::class);
    }

    /**
     * Scopes (professional use)
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }
}
