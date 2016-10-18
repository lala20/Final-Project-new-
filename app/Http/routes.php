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

//Google login
Route::get('auth/google', 'GoogleController@redirectToProvider')->name('google.login');
Route::get('auth/google/callback', 'GoogleController@handleProviderCallback');

//Facebook login
Route::get('facebook', 'FacebookController@redirectToProvider')->name('facebook.login');
Route::get('facebook/callback', 'FacebookController@handleProviderCallback');

Route::get('/', 'PagesController@index');
Route::post('/', 'PagesController@index');

Route::get('/istek', 'IstekController@show');

Route::post('/istek', 'IstekController@store');

Route::get('/isteksil/{id}', 'IstekController@delete');

Route::get('/istekedit/{id}', 'IstekController@edit');

Route::patch('/istekedit/{id}', 'IstekController@update');

Route::get('/destekedit/{id}', 'DestekController@edit');

Route::patch('/destekedit/{id}', 'DestekController@update');

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
Route::post('/elaqe', 'PagesController@elaqesave');

Route::get('/single/{id}', 'PagesController@single');

Route::get('/desteksiyahisi', 'PagesController@desteklist');

Route::get('/isteksiyahisi', 'PagesController@isteklist');

Route::auth();
Route::get('user/activation/{token}', 'Auth\AuthController@activateUser')->name('user.activate');


Route::get('/lists', 'AdminController@lists');

Route::get('/isteklist', 'AdminController@isteklist');
Route::get('/desteklist', 'AdminController@desteklist');
Route::get('/userlist', 'AdminController@userlist');
Route::get('/activate/{id}', 'AdminController@activate');
Route::get('/deactivate/{id}', 'AdminController@deactivate');
