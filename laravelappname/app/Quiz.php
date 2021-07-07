<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    const STATUS_UNRATED=0;
    const STATUS_GOOD = 1;
    const STATUS_FAIR = 2;
    const STATUS_NEUTRAL= 3;
    const STATUS_BAD= 4;
    protected $fillable = [
        'rate', 'count', 'id'
    ];

    protected $hidden = [
         'created_at' ,'updated_at'
    ];
    protected $casts = [
//        'rate' => 'integer',
//        'count' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
