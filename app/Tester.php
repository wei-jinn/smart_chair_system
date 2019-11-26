<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tester extends Model
{
    //

    public static function boot()
    {
        parent::boot();
        self::creating(function ($tester) {
            $tester->id = (string) Str::uuid();
//            $trimmed = $string = str_replace('-', '', $tester->id);
        });
    }
}
