<?php
Route::group(['namespace' => 'App\Http\Controllers\Main'], function() {
	Route::get('/','MainController@home');
});

