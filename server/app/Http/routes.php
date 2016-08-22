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

Route::get('/laravel', function () {
    return view('welcome');
});

//Home 
Route::get('/', 'HomeController@index');
//Route::get('/home', 'HomeController@index');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::controller('book', 'BookController');
Route::controller('wordtype', 'WordTypeController');
Route::controller('lesson', 'LessonController');
Route::controller('word', 'WordController');

//RESTFul routes
//Route::group(array('prefix' => 'api', function() {
Route::group(array('prefix' => 'api', 'middleware' => 'auth.basicOnce'), function() {
  Route::resource('book', 'BookController');
  Route::resource('wordtype', 'WordTypeController');
  Route::resource('lesson', 'LessonController');
  Route::resource('word', 'WordController');
});

Route::group(array('prefix' => 'api/complete/', 'middleware' => 'auth.basicOnce'), function() {
	Route::get('book/{id}', 'BookController@getComplete');
});


//Route::resource('api/book', 'BookController');
/*
Route::get('/book', 'BookController@index');
Route::get('/book/edit/{id}', 'BookController@edit');
Route::get('/book/delete/{id}', 'BookController@delete');
*/

/*
Route::get('/authtest', array('before' => 'auth.basic', function()
{
  return View::make('hello');
}));

//Route::get('/api/book/complete/{id}', 'BookController@getComplete');
//Route::get('/api/complete/book/{id}', ['middleware' => 'auth.basicOnce','uses' => 'BookController@getComplete']);

*/