<?php

namespace App\Http\Controllers;

use App\Photo;
use App\User;
use App\Whiteboard;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
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
        $whiteboards = User::find($uid)->whiteboards()->orderBy('created_at')->get();


        return view('whiteboard.index', compact('whiteboards'));
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
        $whiteboard = User::find($uid)->whiteboards()->orderBy('created_at', 'desc')->FirstOrFail();
        $wid =  $whiteboard->id;
        $username = User::find($uid)->name;
        $token = Str::random(80);
        $whiteboard->token = $token;
        $whiteboard->save();
        $params = [
            'whiteboardid' => $wid,
            'username' => $username,
            'whiteboardtoken' => $token

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

    /**
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
     * Update the specified resource in storage.
     *
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
