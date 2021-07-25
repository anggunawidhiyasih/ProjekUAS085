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
Route::get('password',function(){
    return bcrypt('anggun');
});

Route::get('/wisatas','WisataController@index')->name('wisatas.index');//->middleware('auth:api');
Route::get('/wisatas/{wisata}','WisataController@show')->name('wisatas.show')->middleware('auth:api');
Route::post('/wisatas', 'WisataController@store')->name('wisatas.store');//->middleware('auth:api');
Route::delete('/wisatas/{wisata}', 'WisataController@destroy')->name('wisatas.destroy');//->middleware('auth:api');
Route::patch('/wisatas/{wisata}', 'WisataController@update')->name('wisatas.update');//->middleware('auth:api');

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('wajib', 'AuthController@wajib');

});