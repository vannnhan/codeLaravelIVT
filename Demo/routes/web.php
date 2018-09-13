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

Route::get('/cats/create',[
	'as' => 'cats.create',
	'uses' => 'CatController@create'
])->middleware(['auth']);

Route::post('/cats',[
	'as' => 'cats.store',
	'uses' => 'CatController@store'
])->middleware(['auth']);

Route::get('/cats/{cat}/edit',[
	'as' => 'cats.edit',
	'uses' => 'CatController@edit'
])->middleware(['checklogin']);

Route::put('/cats/{cat}',[
	'as' => 'cats.update',
	'uses' => 'CatController@update'
])->middleware(['checklogin']);

Route::delete('/cats/{cat}',[
	'as' => 'cats.destroy',
	'uses' => 'CatController@destroy'
]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/breeds', [
	'as' => 'breed.index',
	'uses' => 'BreedController@index'
]);

Route::get('/breeds/create', [
	'as' => 'breed.create',
	'uses' => 'BreedController@create'
]);

Route::post('/breeds', [
	'as' => 'breed.store',
	'uses' => 'BreedController@store'
]);

Route::get('/breeds/{id}/edit', [
	'as' => 'breed.edit',
	'uses' => 'BreedController@edit'
]);

Route::put('/breeds/{id}', [
	'as' => 'breed.update',
	'uses' => 'BreedController@update'
]);

Route::delete('/breeds/{id}', [
	'as' => 'breed.destroy',
	'uses' => 'BreedController@destroy'
]);

Route::get('/breeds/{id}', [
	'as' => 'breed.GetCatByBreedId',
	'uses' => 'BreedController@GetCatByBreedId'
]);

Route::get('/not_permit', function() { 
	return view('layouts.not_permittion');
}
);