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

Route::post('/token', 'API\APILoginController@login');

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::post('logout', 'API\APILoginController@logout');
    Route::post('refresh', 'API\APILoginController@refresh');
    Route::get('me', 'API\APILoginController@me');
    Route::get('all', 'API\APILoginController@allUser');
});
