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

Route::get('/', function()
{
	return Redirect::to('api/candidates');
});

Route::pattern('id', '[0-9]+');

Route::group(array('prefix' => 'api/candidates'), function()
{
	Route::get('/', array('uses' => 'CandidateController@getAll'));

});

Route::group(array('prefix' => 'api/provinces'), function()
{
	Route::get('/', array('uses' => 'ProvinceController@getAll'));

});

App::missing(function($exception)
{
	return XApi::response(array('error'=>400, 'results'=>null), 400);
});