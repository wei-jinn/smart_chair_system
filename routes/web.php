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


Route::resource('/whiteboard', 'UserWhiteboardController');

Route::get('/showaccess', function(){

    $user = User::find(1);

    return $user->access_whiteboards;

//    $whiteboard = Whiteboard::find(1);
//
//    return $whiteboard->access_users;


});

Route::get('/verifytoken/{wid}/{wt}' , 'WhiteboardAccessController@verifyToken');

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


