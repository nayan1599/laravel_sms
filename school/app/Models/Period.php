<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $table = 'periods';

    protected $fillable = [
        'period_number',
        'name',
        'start_time',
        'end_time',
        'is_break',
        'sort_order',
    ];

    protected $casts = [
        'is_break' => 'boolean',
        'start_time' => 'datetime:H:i',
        'end_time'   => 'datetime:H:i',
    ];

    // Relation (if used in routine)
    public function timetables()
    {
        return $this->hasMany(Timetable::class);
    }
}
