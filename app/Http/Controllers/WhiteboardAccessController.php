<?php

namespace App\Http\Controllers;

use App\User;
use App\Whiteboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use function GuzzleHttp\Psr7\copy_to_string;

class WhiteboardAccessController extends Controller
{
    //

    public function verifyToken($wid, $wt){

        $access = false;

        $whiteboard = Whiteboard::find($wid);
//        $username = User::find(Auth::user()->getAuthIdentifier())->name;
//        $username = Sentry::getUser()->id;
        $wtoken = $whiteboard->token;
        if($wtoken == $wt){
            $access = true;
        }

        else{
            $access = false;
        }

        if($access){

            return response()->json(
                collect([
                    'access' => 'true',
                    'token' => $wtoken

                ])
            );
        }
        else{
            return response()->json(
                collect([
                    'access' => 'false'

                ])
            );
        }



    }

    public function testAccess(){

        return "Test Whiteboard Access Controller";
    }

    public function getSavedData(Request $data){

        if($data){
            return $data->all();
        }
        else{
            return "request sent failed";
        }

    }

    public function uuid(){

        $str = (string) Str::uuid();
        $trimmed = $string = str_replace('-', '', $str);
        return $trimmed;

    }

}
