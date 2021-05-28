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



//Auth::routes();
Route::group(['namespace'=>'Admin','prefix' => 'admin','middleware'=>'guest:admin'],function (){
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('getlogin');
    Route::post('/login', 'Auth\LoginController@login')->name('admin.login');

});
Route::group(['namespace'=>'Admin','prefix' => 'admin','middleware'=>'auth:admin'],function (){
    Route::get('/dashAdmin', 'HomeController@index')->name('dashboard');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::group(['prefix' => 'product'],function (){
        Route::get('/', 'ProductController@index')->name('product.index');
        Route::get('/AddProd', 'ProductController@addproduct')->name('product.add');
        Route::post('/AddProd', 'ProductController@add')->name('product.add.prod');
        Route::get('/Editprod/{id}', 'ProductController@edit')->name('product.edit');
        Route::post('/Editprod', 'ProductController@update')->name('product.update');
        Route::get('/DeleteProd/{id}', 'ProductController@delete')->name('product.delete');
        Route::get('/ActiveProd/{id}', 'ProductController@active')->name('product.active');
        Route::get('/export', 'orderController@export')->name('order.export');
    });

    Route::group(['prefix' => 'order'],function (){
        Route::get('/', 'OrderController@index')->name('order.index');
        Route::get('/AddOrder', 'OrderController@addorder')->name('order.add');
        Route::post('/AddOrder', 'OrderController@add')->name('order.add.prod');
        Route::get('/EditOrder/{id}', 'OrderController@edit')->name('order.edit');
        Route::get('/DeleteOrder/{id}', 'OrderController@delete')->name('order.delete');
        Route::post('/orderProdDelete', 'OrderController@prodOrderDelete')->name('orderProd.delete');
        Route::post('/orderProdUpdate', 'OrderController@prodOrderUpdate')->name('orderProd.Update');
        Route::get('/search', 'OrderController@search')->name('search');
    });
});


