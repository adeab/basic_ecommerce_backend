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

//register and login
 Route::post('users', 'UserController@store');
 Route::post('login', 'AuthController@login');

 //jwt token authorized route
 Route::group([
    'middleware' => ['api','jwt.verify'],
], function ($router) {

    //logout
    Route::post('logout', 'AuthController@logout');
    
    
    
    // Route::post('refresh', 'AuthController@refresh');
    // Route::post('me', 'AuthController@me');
    // Route::get('users', 'UserController@index');
});

