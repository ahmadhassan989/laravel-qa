<?php

namespace App;
use Parsedown;


use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Null_;

class Answer extends Model
{

    protected $fillable = ['body','user_id'];
    public static function boot()
    {
        parent::boot();

        static::created( function($answer){
            $answer->question->increment('answers');
        });

        static::deleted( function($answer){
            $question = $answer->question;
            $question->decrement('answers');

            if ( $question->best_answer_id == $answer->id ) {
                $question->best_answer_id = null;
                $question->save();
            }

        });
    }
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getBodyHtmlAttribute()
    {
        return Parsedown::instance()->text($this->body);
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getBestAnswerAttribute()
    {
        return $this->id == $this->question->best_answer_id ? 'vote-accepted' : '';
    }
}
