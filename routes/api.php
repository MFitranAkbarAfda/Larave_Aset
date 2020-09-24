<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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
Route::post('/login','Api\UserController@login')->name('login');

Route::post('/register','Api\UserController@register')->name('register');

Route::get('/aset','Api\AsetController@index')->name('aset');
Route::post('aset','Api\AsetController@tambah');
Route::put('/aset/{id}','Api\AsetController@update');
Route::get('/aset/{id}','Api\AsetController@edit');
Route::delete('/aset/{id}','Api\AsetController@destroy');

    
    Route::post('create', 'Api\PassportController@create');
    Route::get('find/{token}', 'Api\PassportController@find');
    Route::post('reset', 'Api\PassportController@reset');
