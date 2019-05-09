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

Route::get('/', 'WelcomeController@index');
Route::get('/welcome/demo', 'WelcomeController@demo');

Route::get('/upisi/demo', 'UpisiController@demo');
Route::get('/upisi/administration', 'UpisiController@dashboard');
Route::get('/upisi/list', 'UpisiController@list');
Route::resource('upisi/predmeti', 'PredmetController');
Route::resource('upisi/smjerovi', 'SmjerController');
Route::resource('upisi/prijave', 'PrijavaController');
Route::resource('upisi/odabirsmjera', 'OdabirSmjeraController');
Route::resource('upisi/kreiranjeranglisti', 'KreiranjeRangListiController');
