<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    //
     protected $fillable = ['title', 'description', 'notice_date', 'expiry_date', 'status', 'created_by', 'image'];

   
}
