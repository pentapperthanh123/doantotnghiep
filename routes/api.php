<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ComputerController;
use App\Http\Controllers\Api\TagController;

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
Route::group(['namespace' => 'Api'], function () {
    Route::get('users', 'UserController@index');
    Route::get('users/{id}', 'UserController@show');
    Route::post('users', 'UserController@store');
    Route::put('users/{id}', 'UserController@update');
    Route::delete('users/{id}', 'UserController@destroy');
});
Route::group(['namespace' => 'Api'], function () {
    Route::get('tags', 'TagController@index');
    Route::post('tags', 'TagController@store');
    Route::put('tags/{id}', 'TagController@update');
    Route::delete('tags/{id}', 'TagController@destroy');

    Route::get('devices', 'DeviceController@index');
    Route::get('devices/{id}', 'DeviceController@show');
    Route::post('devices', 'DeviceController@store');
    Route::put('devices/{id}', 'DeviceController@update');
    Route::delete('devices/{id}', 'DeviceController@destroy');

    Route::get('typedevices', 'TypeDeviceController@index');
    Route::post('typedevices', 'TypeDeviceController@store');
    Route::get('typedevices/{id}', 'TypeDeviceController@show');
    Route::put('typedevices/{id}', 'TypeDeviceController@update');
    Route::delete('typedevices/{id}', 'TypeDeviceController@destroy');

    Route::get('rooms', 'RoomController@index');
    Route::post('rooms', 'RoomController@store');
    Route::get('rooms/{id}', 'RoomController@show');
    Route::put('rooms/{id}', 'RoomController@update');
    Route::delete('rooms/{id}', 'RoomController@destroy');

    Route::get('computers', 'ComputerController@index');
    Route::post('computers', 'ComputerController@store');
    Route::get('computers/{id}','ComputerController@show');
    Route::put('computers/{id}', 'ComputerController@update');
    Route::delete('computers/{id}', 'ComputerController@destroy');
});

Route::prefix('v1')->namespace('Api')->group(function () {
    // Login
    Route::post('/login','AuthController@postLogin');
    // Register
    Route::post('/register','AuthController@postRegister');
    // Protected with APIToken Middleware
    Route::middleware('APIToken')->group(function () {
      // Logout
      Route::post('/logout','AuthController@postLogout');
    });
});

