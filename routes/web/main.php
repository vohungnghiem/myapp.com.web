<?php
Route::group(['namespace' => 'App\Http\Controllers\Main'], function() {
	Route::get('/','MainController@home');
    Route::get('category','MainController@category');
    Route::get('post','MainController@post');
});

