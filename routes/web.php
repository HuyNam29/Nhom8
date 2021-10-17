<?php

use Illuminate\Support\Facades\Route;
 
Auth::routes();     
Route::get('/','App\Http\Controllers\HomeController@index')->name('home'); 
 Route::group(['namespace' =>'App\Http\Controllers\Auth','prefix'=>'account'],function(){
    Route::get('register','RegisterController@getFormRegister')->name('get.register'); // đăng ký
    Route::post('register','RegisterController@create'); // xử lý đăng ký


    Route::get('verify/{user}','RegisterController@getVerifyAccount')->name('user.verify.gmail');//xác thực qua email
    Route::get('verify-phone','RegisterController@getVerifyMessage')->name('user.verify.message');//xác thực qua tin nhắn
    Route::post('verify-phone','RegisterController@postVerifyMessage');//xác thực qua tin nhắn

    Route::get('login','LoginController@getFormLogin')->name('get.login'); // đăng nhập
    Route::post('login','LoginController@postLogin'); // xử lý đăng nhập
    
    Route::get('forgot-password','ResetPasswordController@getFormPassword')->name('get.forgot-password'); // quên mật khẩu
    Route::post('forgot-password','ResetPasswordController@postPassword'); // xử lý quên mật khẩu
    Route::get('accounts/password/reset','ResetPasswordController@changePassword')->name('user.change.password'); // thay đổi mật khẩu
    Route::post('accounts/password/reset','ResetPasswordController@StorePassword'); // thay đổi mật khẩu

    Route::get('logout','LoginController@getLogout')->name('get.logout'); // đăng xuất

});
 

Route::get('/auth/redirect/{provider}', 'App\Http\Controllers\SocialController@redirect');
Route::get('/callback/{provider}', 'App\Http\Controllers\SocialController@callback');

Route::group(['namespace'=>'App\Http\Controllers\Activate'], function () {   
    // post image
    Route::get('/like/post','PostImage@LikePost')->name('like.post'); 
    Route::post('/comment/post','PostImage@CommentPost')->name('comment.post');  
    Route::get('/share/post','PostImage@SharePost')->name('share.post');  
    //post video
    Route::get('/upload/video','PostVideo@UploadVideo')->name('upload.video'); 
    Route::post('/upload/video','PostVideo@StoreVideo'); 
    Route::get('/like/video','PostVideo@LikeVideo')->name('like.video'); 
    Route::get('/comment/video','PostVideo@CommentVideo')->name('comment.video');  
    Route::get('/share/video','PostVideo@ShareVideo')->name('share.video');  
    //change languge 
    Route::get('/language/{language}','LanguageController@index')->name('language');
    //notification
    Route::post('/notification/get','NotificationController@index'); 
    Route::post('/notification/read','NotificationController@read'); 
 
});
//chi tiết bài viết
Route::get('/p/{slug}','App\Http\Controllers\Account\PostController@view_post')->name('post.view'); 
 
