<?php

namespace App\Http\Controllers;

use App\Face;
use App\User;
use Aws\Rekognition\RekognitionClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class FaceModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        $uid = $user->getAuthIdentifier();
        $faces = User::find($uid)->faces()->get();
        $count = 1;

        return view('face.index', compact('user', 'faces','count'));

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
        $face = Face::find($id);

        $args =[
            'region' => 'us-east-2',
            'version' => 'latest'
        ];
        $title = "Delete Face";
        $client = new RekognitionClient($args);
        $result = $client->deleteFaces([
            'CollectionId' => 'c3',
            'FaceIds' => [
                $face->face_id,
            ],
        ]);

        if($result){
            $face->delete();
            return redirect('/face');
        }
        else{
            return "Deletion is unsuccessful";
        }




    }

    public function informerror()
    {
        //
        return "If you see this message, there is no error.";
    }

    public function addFace()
    {


//        $process = new Process("python3 /home/weijin/PycharmProjects/testhowdy/cli/captureface.py");
//        $process->run();
//
//        if (!$process->isSuccessful()) {
//            throw new ProcessFailedException($process);
//        }
//        echo $process->getOutput();
//
//
//        if($process->isSuccessful()){
//
//            echo "Face captured.";

        $capture = shell_exec('python3 /home/weijin/PycharmProjects/testhowdy/cli/captureface.py');


            $userid = Auth::user()->getAuthIdentifier();
            $username = User::find($userid)->name;
            $studentid = User::find($userid)->student_id;
            $trimmed_name = str_replace(" ","_", $username);
            $eid = $userid . "-" . $trimmed_name . ":" . $studentid;



        $args =[

            //different regions stored different collections
            //access_id and secret key that owned by same user will return the same storage based on region chosen.
            'region' => 'us-east-2',
            'version' => 'latest'
        ];


        $inputimg = "/home/weijin/PycharmProjects/testhowdy/cli/photo/addface.jpg";

        if(file_exists($inputimg)){
            $client = new RekognitionClient($args);

            $result = $client->indexFaces([
                'CollectionId' => 'c3',
                'DetectionAttributes' => [
                ],
                'ExternalImageId' => $eid,
                'Image' => [
//                        'Bytes' => file_get_contents($a),
                    'Bytes' => file_get_contents($inputimg),
                ],
                'MaxFaces' => 1,
            ]);

//            echo $result['FaceRecords'][0]['Face']['FaceId'];
//            echo "\n" . $result['FaceRecords'][0]['Face']['ExternalImageId'];

            $face = new Face;
            $face->face_id = $result['FaceRecords'][0]['Face']['FaceId'];
            $face->user_id = $userid;
            $face->save();

            print(" \n Your face model has been successfully added. Redirecting you to your face model list...");

        }

        else {
            print $capture;
        }
        header( "refresh:3 ; url=/face" );


    }
}
