<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'quiz_name'
    ];
    public function questions()
    {
        $this->hasMany('App\Questions');
    }
}
