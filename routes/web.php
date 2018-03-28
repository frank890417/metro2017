<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');
Route::get('/en', 'HomeController@index_eng');

Auth::routes();

// Route::get('/home', 'HomeController@index');


Route::group(['middleware'=>['auth']],function(){
	Route::get('/registwork/file/{stationname}/{dirname}/{filename}', 'RegistController@getfile');
	Route::get('/registwork/manage/{id}', 'RegistController@registview');
	Route::get('/registwork/manage', 'RegistController@registlist');
});

Route::get('/regist_success','RegistController@success');
Route::get('/registwork', 'RegistController@index');
Route::post('/registwork', 'RegistController@create');
Route::post('/registwork2018', 'Regist2018Controller@create');
Route::get('/sendmail','RegistController@sendmail');


Route::get('/regist2018/all',"Regist2018Controller@registlist");

Route::get('/test','RegistController@test');

// Route::get('/lang/{{lang}}/{{name}}',"HomeController@lang");