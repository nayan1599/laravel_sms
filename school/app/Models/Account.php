<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

 
class Account extends Model
{
protected $fillable = [
    'category_id',
    'transaction_type',
    'title',
    'amount',
    'transaction_date',
    'reference_no',
    'description',
    'created_by',
];

    public function category()
    {
        return $this->belongsTo(AccountCategory::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

 
