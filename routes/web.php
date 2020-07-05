<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group wincache_refresh_if_changed()
| contains the "web" middleware group. Now create something great!
|	
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/home', 'HomeController@index')->name('home');

/*
|--------------------------------------------------------------------------
| Route Auth
|--------------------------------------------------------------------------
*/
Route::get('register','Auth\AuthController@getRegister')->name('register');
Route::post('register','Auth\AuthController@postRegister');
Route::get('login', 'Auth\AuthController@getLogin')->name('login');
Route::post('login', 'Auth\AuthController@postLogin');

Route::get('logout', 'Auth\AuthController@getLogout')->name('logout');

//Socical Account Service
Route::get('/redirect/{social}', 'SocialAuthController@redirect');
Route::get('/callback/{social}', 'SocialAuthController@callback');

Route::middleware(['guest', 'locale'])->group(function () {
	/*
	|--------------------------------------------------------------------------
	| Change Language
	|--------------------------------------------------------------------------
	*/
	Route::get('change-language/{language}', 'HomeController@changeLanguage')->name('change-language');

	/*
	|--------------------------------------------------------------------------
	| Routes User
	|--------------------------------------------------------------------------
	*/
	Route::get('users', 'UserController@index');
	Route::get('users/create', 'UserController@create')->middleware('can:user.create');
	Route::post('users', 'UserController@store');
	Route::get('users/{id}/edit', 'UserController@edit')->middleware('can:user.update');
	Route::put('users/{id}', 'UserController@update');
	Route::get('users/{id}', 'UserController@show');
	Route::delete('users/{id}','UserController@destroy')->middleware('can:user.delete');
	Route::get('users/search/{key}', 'UserController@search'); 

	/*
	|--------------------------------------------------------------------------
	| Routes Tag
	|--------------------------------------------------------------------------
	*/
	
	Route::get('tags', 'TagsController@index');
	Route::get('tags/create', 'TagsController@create')->middleware('can:user.create');
	Route::post('tags', 'TagsController@store');
	Route::get('tags/{id}/edit', 'TagsController@edit')->middleware('can:user.update');
	Route::put('tags/{id}', 'TagsController@update');
	Route::get('tags/{id}', 'TagsController@show');
	Route::delete('tags/{id}','TagsController@destroy')->middleware('can:user.delete');
	Route::get('tags/search/{key}', 'TagsController@search'); 

	/*
	|--------------------------------------------------------------------------
	| Routes Room
	|--------------------------------------------------------------------------
	*/
	Route::resource('rooms', 'RoomController');
	
	Route::get('rooms', 'RoomController@index');
	Route::get('rooms/create', 'RoomController@create')->middleware('can:user.create');
	Route::post('rooms', 'RoomController@store');
	Route::get('rooms/{id}/edit', 'RoomController@edit')->middleware('can:user.update');
	Route::put('rooms/{id}', 'RoomController@update');
	Route::get('rooms/{id}', 'RoomController@show');
	Route::delete('rooms/{id}','RoomController@destroy')->middleware('can:user.delete');
	Route::get('rooms/search/{key}', 'RoomController@search'); 
	/*
	|--------------------------------------------------------------------------
	| Routes Device
	|--------------------------------------------------------------------------
	*/

	Route::get('devices', 'DeviceController@index');
	Route::get('devices/create', 'DeviceController@create')->middleware('can:user.create');
	Route::post('devices', 'DeviceController@store');
	Route::get('devices/{id}/edit', 'DeviceController@edit')->middleware('can:user.update');
	Route::put('devices/{id}', 'DeviceController@update');
	Route::get('devices/{id}', 'DeviceController@show');
	Route::delete('devices/{id}','DeviceController@destroy')->middleware('can:user.delete');
	Route::get('devices/search/{key}', 'DeviceController@search'); 

	/*
	|--------------------------------------------------------------------------
	| Routes Computer
	|--------------------------------------------------------------------------
	*/
	Route::get('computers', 'ComputerController@index');
	Route::get('computers/create', 'ComputerController@create')->middleware('can:user.create');
	Route::post('computers', 'ComputerController@store');
	Route::get('computers/{id}/edit', 'ComputerController@edit')->middleware('can:user.update');
	Route::put('computers/{id}', 'ComputerController@update');
	Route::get('computers/{id}', 'ComputerController@show');
	Route::delete('computers/{id}','ComputerController@destroy')->middleware('can:user.delete');
	Route::get('computers/search/{key}', 'ComputerController@search');
	Route::get('computers/create_device','ComputerController@getCreateDevice');
	/*
	|--------------------------------------------------------------------------
	| Routes Type Device
	|--------------------------------------------------------------------------
	*/
	Route::get('typedevices', 'TypeDeviceController@index');
	Route::get('typedevices/create', 'TypeDeviceController@create')->middleware('can:user.create');
	Route::post('typedevices', 'TypeDeviceController@store');
	Route::get('typedevices/{id}/edit', 'TypeDeviceController@edit')->middleware('can:user.update');
	Route::put('typedevices/{id}', 'TypeDeviceController@update');
	Route::get('typedevices/{id}', 'TypeDeviceController@show');
	Route::delete('typedevices/{id}','TypeDeviceController@destroy')->middleware('can:user.delete');
	Route::get('typedevices/search/{key}', 'TypeDeviceController@search'); 
	/*
	|--------------------------------------------------------------------------
	| Routes Task
	|--------------------------------------------------------------------------
	*/
	Route::resource('tasks','TaskController');
	
});