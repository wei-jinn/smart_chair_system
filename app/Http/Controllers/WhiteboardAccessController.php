<?php

namespace App\Http\Controllers;

use App\User;
use App\Whiteboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Psr7\copy_to_string;

class WhiteboardAccessController extends Controller
{
    //

    public function verifyToken($wid, $wt){

        $access = false;

        $whiteboard = Whiteboard::find($wid);
//        $username = User::find(Auth::user()->getAuthIdentifier())->name;
//        $username = Sentry::getUser()->id;
        if($whiteboard->token == $wt){
            $access = true;
        }

        else{
            $access = false;
        }

        if($access){


            return response()->json(
                collect([
                    'access' => 'true',
                    'username' => 'successful',
                ])
            );
        }
        else{
            return "false";
        }



    }

    public function testAccess(){

        return "Test Whiteboard Access Controller";
    }

    public function getSavedData(Request $request){

        if($request){
            return "Request sent is not null";
        }
        else{
            return "request sent failed";
        }

    }

}
