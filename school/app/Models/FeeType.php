<?php 
namespace App\Models;
 use App\Models\ClassModel;
use Illuminate\Database\Eloquent\Model;

class FeeType extends Model
{
 protected $fillable = [
    'name',
    'name_bn',
    'code',
    'is_recurring',
    'frequency',
    'is_refundable',
    'description',
    'is_active',
];

      public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }

    public function fees()
{
    return $this->hasMany(Fee::class);
}
}
