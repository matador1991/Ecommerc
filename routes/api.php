<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

route::group(['prefix'=>'user','namespace'=>'Api\Auth'],function (){
    route::post('login','LoginController@login');
});
route::group(['prefix'=>'user','namespace'=>'Api','middleware'=>'AssignGuard:api'],function (){
    route::post('logout','Auth\LoginController@logout');
    route::post('getAllOrders','AuthController@getAllOrder');
});
