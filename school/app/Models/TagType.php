<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TagType extends Model
{
    protected $fillable = ['name','description', 'status'];

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
}
