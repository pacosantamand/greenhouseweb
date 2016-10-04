<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index');
Route::resource('users','UserController');
Route::resource('variables','VariableController');
Route::resource('invernaderos','InvernaderoController');

Route::get('/invernaderos/{id}/graficas','InvernaderoController@graficas');
// Route::group(array('prefix' => 'restapi/v1'), function()
// {
//   Route::resource('/invernaderos','InvernaderoRestController');
//   Route::resource('/tareas','TareasRestController');
// });