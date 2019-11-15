<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhiteboardController extends Controller
{
    //

    public function run(){

//
//        $output = shell_exec('node server.js');
        $output = shell_exec('node ../server.js');
//
        if($output != null){
            return $output;

        }
        else{
            return "failed";
        }



    }

    public function show(){
        return view('whiteboard');
    }

}
