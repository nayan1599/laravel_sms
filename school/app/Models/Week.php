<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    //
    protected $fillable = [
        'day_name',
        'day_bn',
        'short_name',
        'is_working_day'
    ];

  public function timetbale()
    {
        return $this->hasMany(Timetable::class, 'day_of_week');
    }
}
