<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $fillable = [
        'question', 'opt1', 'opt2','opt3','opt4','correct_ans','quiz_id'
    ];
    public function quiz()
    {
        $this->belongsTo('App\Quiz');
    }
    public function answer()
    {
        $this->hasOne('App\Answers');
    }
}
