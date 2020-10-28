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

Route::get('/', function () {
   return Redirect::to('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::put('/home/registeration/{id}', 'HomeController@registeration')->name('home.registeration');


Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');


/*Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin', 'middleware' => 'auth'], function(){*/


	// User Index
    Route::get('/projects',                 'ProjectController@index')->name('projects.index');
    // User Create 
    Route::get('/projects/create',          'ProjectController@create')->name('projects.create');
    Route::post('/projects/store',          'ProjectController@store')->name('projects.store');
    // User Edit
    Route::get('/projects/edit/{id}',       'ProjectController@edit')->name('projects.edit');
    Route::put('/projects/update/{id}',     'ProjectController@update')->name('projects.update');
    // User Delete
    Route::delete('/projects/delete/{id}',  'ProjectController@delete')->name('projects.delete');


Route::group(['namespace' => 'Auth', 'as' => 'auth'], function(){
    Route::get('/logout',    'LoginController@logout')->name('.logout');


});



Route::get('google', function () {
    return view('googleAuth');
});
    
Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');
