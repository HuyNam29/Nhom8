<?php

use Illuminate\Support\Facades\Route;
 


Route::get('/','App\Http\Controllers\HomeController@index')->name('home'); 
 Route::group(['namespace' =>'App\Http\Controllers\Auth','prefix'=>'account'],function(){
    Route::get('login','LoginController@getFormLogin')->name('get.login'); // đăng nhập
    Route::post('login','LoginController@postLogin'); // xử lý đăng nhập
    Route::get('logout','LoginController@getLogout')->name('get.logout'); // đăng xuất
});  