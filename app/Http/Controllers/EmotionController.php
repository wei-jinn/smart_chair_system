<?php

namespace App\Http\Controllers;

use App\Emotion;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $uid = Auth::user()->getAuthIdentifier();
        $student_id = User::find($uid)->student_id;
        $user= Auth::user();

        $emotion = Emotion::where('student_id', $student_id)->orderBy('id','desc')->first();
        header( "refresh:3 ; url=/emotion" );
        return view('emotion.view', compact('user', 'emotion'));
//        return $emotion;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        $emotion = new Emotion();
        $emotion->student_id = $request->get('student_id');
        $emotion->happy = $request->get('happy');
        $emotion->sad = $request->get('sad');
        $emotion->confused = $request->get('confused');
        $emotion->fear = $request->get('fear');
        $emotion->surprised = $request->get('surprised');
        $emotion->disgusted = $request->get('disgusted');
        $emotion->calm = $request->get('calm');
        $emotion->angry = $request->get('angry');
        $emotion->most_likely = $request->get('most_likely');
        $emotion->save();
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
}
