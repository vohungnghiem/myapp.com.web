<?php
use Illuminate\Support\Facades\Route;
foreach (File::allFiles(__DIR__ . DIRECTORY_SEPARATOR . "web") as $partial) {
	require_once $partial->getPathname();
}

// language
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);
// plugin image
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => 'auth'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
// storage link image
Route::get('/linkstorage', function () {
    Artisan::call('storage:link'); // thay php artisan storage:link
});
// clear cache
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
