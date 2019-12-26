<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\User;
use App\Whiteboard;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

Route::get('/', function () {
    return view('welcome');
//    return "This is the main page";
});

Route::get('/index', function () {
    return view('index');

});

Route::get('/run', 'WhiteboardController@run');
Route::get('/show', 'WhiteboardController@show');
Route::get('/hello', function () {
    return "Hello again";
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/whiteboard/savejson' , 'UserWhiteboardController@saveJson');
Route::get('/whiteboard/getcontent/{content}' , 'UserWhiteboardController@getContent');
Route::get('/whiteboard/getip' , 'UserWhiteboardController@getIp');
Route::post('/whiteboard/join' , 'UserWhiteboardController@join');
Route::get('/whiteboard/viewmembers/{id}' , 'UserWhiteboardController@viewmembers')->name('whiteboard.viewmembers');
Route::get('/test' , 'UserWhiteboardController@test')->name('test');
Route::resource('/whiteboard', 'UserWhiteboardController');


Route::get('/face/informerror' , 'FaceModelController@informerror');
Route::get('/face/addface' , 'FaceModelController@addFace')->name('face.addface');
// if you want to add functions to resource controller, add the particular route before the resource defined route.
Route::resource('/face', 'FaceModelController');

Route::resource('/emotion', 'EmotionController');

Route::resource('/login/attempt', 'LoginAttemptController');

Route::resource('/attendance', 'AttendanceController');

Route::get('/showaccess', function(){

    $user = User::find(1);

    return $user->access_whiteboards;

//    $whiteboard = Whiteboard::find(1);
//
//    return $whiteboard->access_users;


});

Route::get('/verifytoken/{wid}/{wt}' , 'WhiteboardAccessController@verifyToken');

Route::post('/getsaveddata' , 'WhiteboardAccessController@getSavedData');

//Route::get('/testAccess', 'WhiteboardAccessController@testAccess');

//
//Route::get('/start/{wid}/{uname}',function($wid, $uname){
//
//    try{
//        $client = new Client();
//        $response = null;
//        $params = [
//            'whiteboardid' => $wid,
//            'username' => $uname
//
//        ];
//
//        $query = http_build_query($params);
//        $response = $client->request('GET', 'http://whiteboard.test:8090?'.$query);
//        return redirect('http://whiteboard.test:8090?'.$query);
//
//    }catch (GuzzleException $e) {
//    }
//
//});
//
//Route::get('/test', function(){
//    return "show testing message";
//});

Route::get('/getuuid' , 'WhiteboardAccessController@uuid');




