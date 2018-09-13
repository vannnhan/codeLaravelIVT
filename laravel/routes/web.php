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
    return redirect()->route('cats.index');
});

Route::get('/cats',[ 
	'as' => 'cats.index',
	'uses' => 'CatController@index'
]);

Route::get('/cats/create', [
	'as' => 'cats.create',
	'uses' => 'CatController@create'
]);

Route::post('/cats',[
	'as' => 'cats.store',
	'uses' => 'CatController@store'
]);

Route::get('/cats/{cat}/edit',[
	'as' => 'cats.edit',
	'uses' => 'CatController@edit'
]);

Route::put('/cats/{cat}',[
	'as' => 'cats.update',
	'uses' => 'CatController@update'
]);

Route::delete('/cats/{cat}',[
	'as' => 'cats.destroy',
	'uses' => 'CatController@destroy'
]);

