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

/*
	Start User Part
*/
Route::group(['namespace' => 'User'], function () {
    Route::get('/','UserController@Home')->name('user.home');
});
/*
	Start Admin Part
*/
Route::group(['prefix' => 'admin','namespace' => 'Admin','middleware' => ['NotLogged']], function () {
    Route::get('/OUi2WZVgIzsSNwjGuilKkXb1TI5L','AdminController@login')->name('admin.login');
    Route::post('LoginAdmin','AdminController@LoginAdmin')->name('login.admin');
});
Route::group(['prefix' => 'admin','namespace' => 'Admin','middleware' => ['IsLogin']], function () {
    Route::get('homepage','AdminController@Homepage')->name('admin.homepage');
    Route::get('logout','AdminController@logout')->name('admin.logout');
});