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


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/lang/{lang}/{name}',"HomeController@lang");

Route::group(['middleware'=>'cors'],function(){
  Route::get('/regist2018/all',"Regist2018Controller@registlist");
});



// Route::get('/test','RegistController@test');
