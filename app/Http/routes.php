<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Elan;
use App\Elantype;
use App\User;
use App\City;


Route::group(['middleware' => 'admin'],function(){
  Route::group(['middleware' => 'auth:admin'],function(){
      Route::get('/alfagen', 'AdminController@index');
});
  Route::get('/alfagen/login', 'AdminController@login');
  Route::post('/alfagen/postLogin', 'AdminController@postLogin');
  Route::get('/alfagen/logout', 'AdminController@logout');
});

Route::get('/', 'PagesController@index');
Route::post('/', 'PagesController@index');

Route::get('/istek', 'IstekController@show');

Route::post('/istek', 'IstekController@store');

Route::get('/isteksil/{id}', 'IstekController@delete');

Route::get('/destek', 'DestekController@show');

Route::post('/destek', 'DestekController@store');

Route::get('/desteksil/{id}', 'DestekController@delete');

Route::get('/haqqimizda', 'PagesController@haqqimizda');

Route::get('/profil', 'PagesController@profil');

Route::post('/profil', 'PagesController@update');

Route::post('/avatar', 'PagesController@avatar');

Route::get('/desteklerim', 'DestekController@desteklerim');

Route::get('/isteklerim', 'IstekController@isteklerim');

Route::get('/elaqe', 'PagesController@elaqe');

Route::get('/single/{id}', 'PagesController@single');

Route::get('/desteksiyahisi', 'PagesController@desteklist');

Route::get('/isteksiyahisi', 'PagesController@isteklist');

Route::auth();

Route::get('/lists', 'AdminController@lists');

Route::get('/isteklist', 'AdminController@isteklist');
Route::get('/desteklist', 'AdminController@desteklist');
Route::get('/userlist', 'AdminController@userlist');
Route::get('/activate/{id}', 'AdminController@activate');
Route::get('/deactivate/{id}', 'AdminController@deactivate');
