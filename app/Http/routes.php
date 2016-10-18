<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('app');
});

Route::group(['prefix' => 'api'], function(){
    Route::resource('members', 'MemberController');
});
Route::post('uploadImg', 'MemberController@uploadImg');

// Cau hinh thay the duoi .php thanh .html de laravel hieu dc, de trong folder template
Route::group(array('prefix'=>'/templates/'),function(){
   Route::get('{template}', array( function($template)
   {
       $template = str_replace(".html","",$template);
       View::addExtension('html','php');
       return View::make('templates.'.$template);
   }));
});
