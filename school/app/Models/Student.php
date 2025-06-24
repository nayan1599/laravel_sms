<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
protected $fillable = [
        'name',
        'email',
        'phone',
        'dob',
        'gender',
        'class',
        'section',
        'roll',
        'address',
        'photo'
    ];
}
