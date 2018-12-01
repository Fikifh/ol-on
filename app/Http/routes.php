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

Route::get('/', 'dashboardController@home');
Route::get('welcome', function(){
   return view('welcome'); 
});

Route::post('login', 'Authentikasi@loginPost');
Route::get('login', 'Authentikasi@login');
Route::get('user/register', 'Authentikasi@register');
Route::post('user/register', 'Authentikasi@registerPost');

Route::get('home', 'homeController@home');
Route::get('profil', 'homeController@profil');
Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/detailproduk/{id}', 'dashboardController@detailproduk');
Route::post('/beli/{id}/{session}', 'dashboardController@beli');
Route::post('/keranjang/{id}/{user}', 'dashboardController@keranjang');
Route::get('/keranjang/{user}', 'dashboardController@getKeranjang');
Route::post('/checkout', 'transaksiController@checkout');

Route::get('/hapusbarang/{id}/{user}', 'transaksiController@hapusbarang');

Route::post('/bayar/{user}', 'transaksiController@bayar');
