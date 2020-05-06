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
    return view('welcome');
});

Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/profile', 'ProfileController@show')->name('profile.show');

Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');

Route::post('/profile/edit', 'ProfileController@update')->name('profile.update');

Route::get('/profile/password', 'ProfileController@passwordEdit')->name('password.edit');

Route::post('/profile/password', 'ProfileController@passwordChange')->name('password.change');

Route::get('/profile/image', 'ProfileController@image')->name('profile.image');

Route::post('/profile/image', 'ProfileController@imageEdit')->name('image.edit');

Route::get('/profile/delete', 'ProfileController@delete')->name('profile.delete');

Route::post('/profile/delete', 'ProfileController@deleteUser')->name('delete.user');
