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
    Route::get('logout','AdminController@logout')->name('admin.logout');
    Route::get('homepage','AdminController@Homepage')->name('admin.homepage');
    Route::get('AddProduct','AdminController@AddProduct')->name('admin.AddProduct');
    Route::get('AllProduct','AdminController@AllProduct')->name('admin.AllProduct');
    Route::get('EditProduct/{id}','AdminController@EditProduct')->name('admin.EditProduct');
    Route::get('DeleteProduct/{id}','AdminController@DeleteProduct')->name('admin.DeleteProduct');
    Route::post('GalleryRemove','AdminController@GalleryRemove')->name('admin.GalleryRemove');
    Route::post('GalleryUpdate','AdminController@GalleryUpdate')->name('admin.GalleryUpdate');
    Route::post('GalleryAdd','AdminController@GalleryAdd')->name('admin.GalleryAdd');
    Route::post('NewProduct','AdminController@NewProduct')->name('admin.NewProduct');
    Route::post('UpdateProduct','AdminController@UpdateProduct')->name('admin.UpdateProduct');
});
/*
	End Admin Part
*/
/*
	Start Product Part
*/
Route::group(['prefix' => 'product','namespace' => 'product'], function () {
    Route::get('productinfo','ProductController@productinfo')->name('product.productinfo');
});