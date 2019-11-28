<?php

namespace App\Http\Controllers;

use App\Photo;
use App\User;
use App\Whiteboard;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserWhiteboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $user = Auth::user();
        $uid = $user->getAuthIdentifier();
        $whiteboards = User::find($uid)->access_whiteboards()->orderBy('created_at')->get();


        return view('whiteboard.index', compact('whiteboards', 'user', 'uid'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('whiteboard.create');


    }

    public function viewmembers($id)
    {
        $members = Whiteboard::find($id)->access_users()->get();
        $whiteboard = Whiteboard::find($id);
//
//        $whiteboards = User::find($uid)->orderBy('created_at')->get();
        return view('whiteboard.viewmembers' , compact('members', 'whiteboard') );
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $input = $request->all();
        $user = Auth::user();
        $user->whiteboards()->create($input);

        $uid = $user->getAuthIdentifier();
        $username = User::find($uid)->name;

        $whiteboard = User::find($uid)->whiteboards()->orderBy('created_at', 'desc')->FirstOrFail();
        $uuid = (string) Str::uuid();
        $whiteboard->uuid = str_replace('-', '', $uuid);

        $whiteboard->save();


        DB::table('user_whiteboard')->insert(
            ['user_id' => $uid, 'whiteboard_id' => $whiteboard->id]
        );




//        $user->access_whiteboards()->create($input);

        //to be sent to blade
        $wid =  $whiteboard->id;
        $title = $whiteboard->title;




        $params = [
            'whiteboardid' => $whiteboard->uuid,
            'username' => $username,
        ];

        $query = http_build_query($params);
        return redirect('http://whiteboard.test:8090?'.$query);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**z
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        //

    }

    /**
     * Update the specified resource in storage
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

//        $whiteboard = Whiteboard::find($id);
//        $content = $request->input('content');
//        $name = $request->input('user.name');
//        $whiteboard->content->update($content);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $uid = Auth::user()->getAuthIdentifier();


        $whiteboard = Whiteboard::find($id);
        if($whiteboard->user_id == $uid){
            $whiteboard->delete();

            $access_whiteboard = DB::table('user_whiteboard')
                ->where([
                    ['whiteboard_id', '=', $id],
                ])->delete();

        }


        $access_whiteboard = DB::table('user_whiteboard')
            ->where([
                ['whiteboard_id', '=', $id],
                ['user_id', '=', $uid],
            ])->delete();

        return redirect('/whiteboard');
    }

    public function join(Request $request)
    {
        //Handle exception id of non object is not found.
        try{
            $uid = Auth::user()->getAuthIdentifier();
            $username = User::find($uid)->name;
            $url = $request->input('url');
            $equalsign =  stripos($url, "=");
            $whiteboard_uuid = substr($url,$equalsign+1, 32);
            $whiteboard = Whiteboard::where('uuid', $whiteboard_uuid)->first();

            if($whiteboard!=null){
                $whiteboardid = $whiteboard->id;



                $record =  DB::table('user_whiteboard')
                    ->where([
                        ['whiteboard_id', '=', $whiteboardid],
                        ['user_id', '=', $uid],
                    ])->first();

                $params = [
                    'whiteboardid' => $whiteboard_uuid,
                    'username' => $username,
                ];

                $query = http_build_query($params);


                if($record){
            return redirect('http://whiteboard.test:8090?'.$query);

                }
                else{
                    DB::table('user_whiteboard')->insert(
                        ['user_id' => $uid, 'whiteboard_id' => $whiteboardid]
                    );
            return redirect('http://whiteboard.test:8090?'.$query);

                }

            }else{
                return "The whiteboord is not found";
            }


        }catch(Exception $e){
            echo "Failed to join.";
        }


    }



//    public function getGuzzleRequest()
//    {
//
//try{
//    $client = new Client();
//    $response = null;
//    $whiteboardid = 001;
//    $username = 'ABC';
//    $params = [
//        'whiteboardid' => $whiteboardid,
//        'username' => $username
//
//    ];
//
//    $query = http_build_query($params);
//    $response = $client->request('GET', 'http://whiteboard.test:8090?'.$query);
//    return redirect('http://whiteboard.test:8090?'.$query);
//
//}catch (GuzzleException $e) {
//        }
//
//
////        try {
////            $client->request('GET', 'http://whiteboard.test:8090', [
////                'query' => ['whiteboardid' => '001', 'username' => 'JJ']
////            ]);
////        } catch (GuzzleException $e) {
////        }==
//
//
////        $whiteboardid = "001";
////        $username = "JJ";
////        $request = $client->get($url,  ['whiteboardid'=>$whiteboardid, 'username' => $username]);
////        $response = $request->send();
//
//
//
//    }
}