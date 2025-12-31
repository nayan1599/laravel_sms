<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolCommittee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'designation',
        'email',
        'phone',
        'address',
        'status',
        'profile_photo',
    ];
}
