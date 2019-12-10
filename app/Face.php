<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Face extends Model
{
    //

    protected $fillable=[

        'id',
        'face_id',
        'user_id'

    ];
}
