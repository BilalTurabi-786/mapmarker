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

Route::get('/', function () {
    return view('clientside.page.map');
});
Route::get('/logout', function () {
    return view('clientside.page.map');
})->name('admin.logout');
Route::get('dashboard', function () {
    return view('admin.pages.dashboard');
})->name('dashboard');

Route::get('google-map',['as'=>'admin.google-map','uses'=>"\App\Http\Controllers\Admin\MapController@google_map"]);
Route::post('google-map-process',['as'=>'admin.google-map-process','uses'=>"\App\Http\Controllers\Admin\MapController@google_map_process"]);
Route::get('get-markers',['as'=>'get-markers','uses'=>"\App\Http\Controllers\Admin\MapController@get_marker"]);

Route::get('import-excel',['as'=>'admin.import-excel','uses'=>"\App\Http\Controllers\Admin\MapController@import_excel"]);
Route::post('import-excel-process',['as'=>'admin.import-excel-process','uses'=>"\App\Http\Controllers\Admin\MapController@import_excel_process"]);
