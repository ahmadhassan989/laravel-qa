<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Str;

class Question extends Model
{
     public function user()
     {
         return $this->belongsTo(User::class,"id");
     }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }


}
