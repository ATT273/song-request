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

Route::get('/', function () {
    return view('welcome');
});

//bi loi
// Route::get('index','Controller@getLink');

//dang su dung
Route::get('index',function(){
	return view('index2');
});
Route::get('reload-list','Controller@reloadList');
Route::get('set-played/{id}','Controller@setPlayed');
Route::get('getmsg','Controller@getLink2');
Route::get('request','Controller@getRequestPage');
Route::post('queue_song','Controller@postAddSong');
// Route::get('index3','Controller@getLink2');