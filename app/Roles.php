<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $fillable = [
        'quiz_name'
    ];
    public function users() {

        return $this->belongsToMany('App\User');
    }
}
