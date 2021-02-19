<?php

namespace App;
use Parsedown;

use Illuminate\Database\Eloquent\Model;
use Str;

class Question extends Model
{

    protected $fillable = ['body', 'title'];
     public function user()
     {
         return $this->belongsTo(User::class);
     }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getUrlAttribute()
    {
        return route('questions.show',$this->slug);
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getStatusAttribute()
    {
        if($this->answers > 0 ){
            if($this->best_answer_id){
                return "answered-accepted";
            }
            return "answered";
        }
        return "unanswered";
    }

    public function getBodyHtmlAttribute()
    {
        return Parsedown::instance()->text($this->body);
    }

    public function answer_s()
    {
        return $this->hasMany(Answer::class);
    }

    public function acceptBestAnswer(Answer $answer)
    {
      $this->best_answer_id = $answer->id;
      $this->save();
    }


}
