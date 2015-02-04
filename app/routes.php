<?php

Route::get('/','PagesController@index');
Route::get('home',['as'=>'home','uses'=>'PagesController@home']);
Route::controller('account','AuthController');
Route::resource('posts','PostsController');
Route::post('download','PostsController@download');
Route::controller('settings','SettingsController');
Route::get('members',['as'=>'users.index','uses'=>'UsersController@index']);
Route::get('@{username}',['as'=>'users.show','uses'=>'UsersController@show']);
Route::get('login/facebook',['as'=>'facebook','uses'=>'SocialController@loginWithFacebook']);
Route::get('login/twitter', ['as'=>'twitter' ,'uses'=>'SocialController@loginWithTwitter']);
Route::get('login/google', ['as'=>'google' ,'uses'=>'SocialController@loginWithGoogle']);
Route::get('login/linkedin', ['as'=>'linkedin' ,'uses'=>'SocialController@loginWithLinkedin']);

// Route::controller('password', 'RemindersController');
