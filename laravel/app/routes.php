<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::group(array('before' => 'auth'), function(){
	
});

Route::get('/Steamlogin/{action?}', array('as' => 'Steamlogin', 'uses' => 'SteamController@login'));
Route::get('/Steamlogout', array('as' => 'Steamlogout', 'uses' => 'SteamController@logout'));

Route::get('/', array('as' => 'home' ,function()
{
	return View::make('hello');
}));
