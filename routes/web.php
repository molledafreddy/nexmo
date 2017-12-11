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

/*Route::get('/', function () {
    $nexmo = app('Nexmo\Client');
	$nexmo->message()->send([
	    'to'   => '584262401376',
	    'from' => '584262401376',
	    'text' => 'Using the instance to send a message.'
	]);
});
*/

use Illuminate\Support\Facades\Log;
Route::get('/', function () {
    $inbound = \Nexmo\Message\InboundMessage::createFromGlobals();
	if($inbound->isValid()){
    	error_log($inbound->getBody());
	} else {
    	error_log('invalid message');
	}
	Log::info("paso");
});

	
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

