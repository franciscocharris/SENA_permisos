<?php

use Illuminate\Support\Facades\Route;

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

Route::get('login/{driver}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{driver}/callback', 'Auth\LoginController@handleProviderCallback');

// home controller - dashboard
Route::get('/home', 'HomeController@index')->name('home');

// rutas usuarios
Route::get('user/{user}/role', 'UserController@role')->middleware('can:user.role')->name('user.role');
Route::patch('user/saverole', 'UserController@saveRole')->middleware('can:user.saverole')->name('user.saverole');
Route::resource('user', 'UserController')->except(['store', 'create']);

// tutas roles
Route::resource('roles', 'RoleController');

