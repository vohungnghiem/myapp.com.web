<?php
Route::group(['namespace' => 'App\Http\Controllers\Main'], function() {
	Route::get('/','MainController@home');
    Route::get('category','MainController@category');
    Route::get('post','MainController@post');
    Route::get('load/more','MainController@getLoadmore');
    Route::get('muc/{slug}','MainController@muc');
    Route::get('expend/{slug}','MainController@expend');
});

