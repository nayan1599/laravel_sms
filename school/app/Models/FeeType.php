<?php 
namespace App\Models;
 use App\Models\ClassModel;
use Illuminate\Database\Eloquent\Model;

class FeeType extends Model
{
    protected $fillable = ['name', 'description', 'default_amount' , 'class_id','expiry_date'];


      public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }

    public function fees()
{
    return $this->hasMany(Fee::class);
}
}
