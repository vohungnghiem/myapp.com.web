<?php

// auth
Route::group(['namespace' => 'App\Http\Controllers\Admin','prefix' => 'admincp'], function() {
	Route::get('login', 'AdminLoginController@getLogin')->name('login');
	Route::post('login','AdminLoginController@postLogin');
	Route::get('logout','AdminLoginController@getLogout');
});
// role
Route::group(['middleware' => 'auth','namespace' => 'App\Http\Controllers','prefix' => 'admincp'], function() {
	Route::get('generate','RoleController@generate');
    Route::group(['middleware' => ['role:super-admin'],'prefix' => 'modelroles'],function(){
		Route::get('/','RoleController@get_model');
		Route::post('/','RoleController@post_model');
	});
	Route::group(['middleware' => ['role:super-admin'],'prefix' => 'role_permission'],function(){
		Route::get('/','RoleController@get_role_permission');
		Route::post('/','RoleController@post_role_permission');
	});
});

Route::group(['middleware' => 'auth','namespace' => 'App\Http\Controllers\Admin','prefix' => 'admincp'], function() {
    Route::get('/','HomeController@index');
    Route::group(['prefix' => 'account'],function(){
        Route::get('/','AccountController@index');
        Route::get('create','AccountController@create');
        Route::post('store', 'AccountController@store');
        Route::get('edit/{id}', 'AccountController@edit');
        Route::post('{id}/update', 'AccountController@update');
        Route::post('status','AccountController@status');
        Route::post('remove_img','AccountController@remove_img');
        Route::post('destroy', 'AccountController@destroy');
    });
    Route::group(['prefix' => 'categories'],function(){
        Route::get('/','VHNCategoryController@index');
        Route::get('create','VHNCategoryController@create');
        Route::post('store', 'VHNCategoryController@store');
        Route::get('edit/{id}', 'VHNCategoryController@edit');
        Route::post('{id}/update', 'VHNCategoryController@update');
        Route::post('status','VHNCategoryController@status');
        Route::post('destroy', 'VHNCategoryController@destroy');
    });
    Route::group(['prefix' => 'posts'],function(){
        Route::get('/','VHNPostController@index');
        Route::get('create','VHNPostController@create');
        Route::post('store', 'VHNPostController@store');
        Route::get('edit/{id}', 'VHNPostController@edit');
        Route::post('{id}/update', 'VHNPostController@update');
        Route::post('status','VHNPostController@status');
        Route::post('destroy', 'VHNPostController@destroy');
    });

});
// database
Route::group(['middleware' => 'auth','namespace' => 'App\Http\Controllers\Admin','prefix' => 'admincp'], function() {
    Route::get('datatables/users','VHNDatatablesController@users');
    Route::get('datatables/posts','VHNDatatablesController@posts');
});
// import - export
Route::group(['namespace' => 'App\Http\Controllers'], function() {
    Route::get('export/', 'ExportController@export');
    Route::get('import/', 'ImportController@getImport');
    Route::post('import/', 'ImportController@postImport');
});

