<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Whiteboard extends Model
{
    //

   protected $fillable=[

       'id',
       'title',
       'content',
       'user_id',

   ];

   public function user(){

       return $this->belongsTo('App\User');


   }

    public function access_users(){

        return $this->belongsToMany('App\User');


    }

}
