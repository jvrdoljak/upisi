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
Route::group(['middleware' => ['web']], function () {
    //Route za autentifikaciju
    //Auth::routes();
    Route::get('/login', array('as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm'));
    Route::post('/login', 'Auth\LoginController@login');
    Route::get('/logout', array('as' => 'logout', 'uses' => 'Auth\LoginController@logout'));

    Route::get('/register',array('as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm'));
    Route::post('/register','Auth\RegisterController@register');
    
    Route::get('/', 'WelcomeController@index');

    Route::get('/upisi/administration', 'UpisiController@dashboard');
    Route::resource('upisi/predmeti', 'PredmetController');
    Route::resource('upisi/smjerovi', 'SmjerController');
    Route::resource('upisi/prijave', 'PrijavaController');
    Route::get('upisi/prijave/{email}/{hash}', 'PrijavaController@verificateEmail');
    Route::resource('upisi/odabirsmjera', 'OdabirSmjeraController');
    Route::resource('upisi/kreiranjeranglisti', 'KreiranjeRangListiController');
    //File upload route
    Route::resource('upisi/files', 'FilesController');
    //Download route
    Route::get('upisi/files/download/{filename}',array('as' => 'files.download', 'uses' => 'FilesController@download'));


    //Route::get('sendbasicemail','MailController@basic_email');
    Route::get('sendhtmlemail','MailController@html_email');
    //Route::get('sendattachmentemail','MailController@attachment_email');
});

