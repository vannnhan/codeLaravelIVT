<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace'=>'Api'], function(){
	Route::get('/cats',
	[
		'as' => 'cat.index',
		'uses' => 'CatController@index'
	]);

	Route::post('/cats',[
	'as' => 'cats.store',
	'uses' => 'CatController@store'
	]);

	Route::delete('/cats/{cat}',[
	'as' => 'cats.destroy',
	'uses' => 'CatController@destroy'
	]);

});
