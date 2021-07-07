<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $fillable = [
        'description'
    ];
    public function quizRates()
    {
        return $this->hasMany('App\Quiz' , 'quiz_id', 'id');
    }
}
