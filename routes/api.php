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
//User Login API Route
Route::post('login', 'APILoginController@login');
Route::post('generateNewToken', 'APILoginController@generateNewToken');

//User Create
Route::post('user_create',['uses'=>'UsersController@userCreate']);

//After Login check middleware' =>'jwt.auth'
Route::post('user_list',['middleware'=>['jwt.auth'],'uses'=>'UsersController@userList']);
Route::post('user_edit',['middleware'=>'jwt.auth','uses'=>'UsersController@userEdit']);
Route::post('user_details',['middleware'=>'jwt.auth','uses'=>'UsersController@userDetails']);
Route::post('changePassword',['middleware'=>'jwt.auth','uses'=>'UsersController@changePassword']);
Route::post('logout',['middleware'=>'jwt.auth','uses'=>'APILoginController@logout']);