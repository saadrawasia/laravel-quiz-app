<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    protected $fillable = [
        'question_id', 'ans','quiz_id','user_id',
    ];
    public function question()
    {
        $this->belongsTo('App\Questions');
    }
}
