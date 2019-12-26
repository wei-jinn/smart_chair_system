<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emotion extends Model
{
    //
    protected $fillable=[

        'student_id',
        'happy',
        'sad',
        'surprised',
        'fear',
        'disgusted',
        'angry',
        'confused',
        'calm',
        'most_likely'

    ];
}
