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
Route::prefix('admin')->namespace('Admin')->group(function(){
	Route::group(['middleware'=>'AdminGuest'],function (){
    Route::get('/auth/login',['as'=>'admin.auth.login','uses'=>'\App\Http\Controllers\Admin\LoginController@Login']);
	Route::post('/auth/attempt',['as'=>'admin.auth.attempt','uses'=>'\App\Http\Controllers\Admin\LoginController@attempt']);
	Route::get('/auth/forgetpassword',['as'=>'admin.auth.forgetpassword','uses'=>'\App\Http\Controllers\Admin\LoginController@forget']);
	Route::post('/auth/forgetpassword-process',['as'=>'admin.auth.forgetpassword-process','uses'=>'\App\Http\Controllers\Admin\LoginController@forget_process']);
	Route::get('/auth/resetpassword/{token}',['as'=>'admin.auth.resetpassword','uses'=>'\App\Http\Controllers\Admin\LoginController@resetpassword']);
	Route::post('/auth/resetpassword-process',['as'=>'admin.auth.resetpassword-process','uses'=>'\App\Http\Controllers\Admin\LoginController@resetpassword_process']);
    });
    Route::group(['middleware'=>"AdminAuth"], function(){
        Route::get('google-map',['as'=>'admin.google-map','uses'=>"\App\Http\Controllers\Admin\MapController@google_map"]);
        Route::post('google-map-process',['as'=>'admin.google-map-process','uses'=>"\App\Http\Controllers\Admin\MapController@google_map_process"]);
        Route::get('get-markers',['as'=>'get-markers','uses'=>"\App\Http\Controllers\Admin\MapController@get_marker"]);
        Route::get('logout',['as'=>'admin.logout','uses'=>'\App\Http\Controllers\Admin\LoginController@logout']);
        Route::get('import-excel',['as'=>'admin.import-excel','uses'=>"\App\Http\Controllers\Admin\MapController@import_excel"]);
        Route::post('import-excel-process',['as'=>'admin.import-excel-process','uses'=>"\App\Http\Controllers\Admin\MapController@import_excel_process"]);
        Route::get('get-contacts',['as'=>'admin.get-contacts','uses'=>"\App\Http\Controllers\Front\ContactUsController@get_contacts"]);
        Route::post('send-qoute',['as'=>'admin.send-qoute','uses'=>"\App\Http\Controllers\Front\ContactUsController@send_qoute"]);
        Route::get('filters',['as'=>'admin.filters','uses'=>"\App\Http\Controllers\FilterController@index"]);
        Route::post('add-filter',['as'=>'add-filter','uses'=>"\App\Http\Controllers\FilterController@add_filter"]);
    });
});
Route::get('get-markers',['as'=>'get-markers','uses'=>"\App\Http\Controllers\Admin\MapController@get_marker"]);

Route::group(['middleware'=>'UserAuth'],function (){
    Route::get('profile',['as'=>'profile','uses'=>"\App\Http\Controllers\Front\LoginController@profile"]);
     Route::get('logout',['as'=>'logout','uses'=>"\App\Http\Controllers\Front\LoginController@logout"]);


});
Route::get('contact',['as'=>'contact','uses'=>"\App\Http\Controllers\Front\ContactUsController@index"]);

Route::post('contact-process',['as'=>'contact-process','uses'=>"\App\Http\Controllers\Front\ContactUsController@store"]);
Route::get('login',['as'=>'login','uses'=>"\App\Http\Controllers\Front\LoginController@login"]);
Route::post('login-process',['as'=>'login-process','uses'=>"\App\Http\Controllers\Front\LoginController@login_process"]);



Route::get('/',['as'=>'/','uses'=>"\App\Http\Controllers\Front\HomeController@index"]) ;

Route::get('addlisting',['as'=>'addlisting','uses'=>"\App\Http\Controllers\Front\ListingController@addlisting"]);
Route::get('list-process',function(){
    return view('clientside.page.addlisting');
});
Route::post('list-process',['as'=>'list-process','uses'=>"\App\Http\Controllers\Front\ContactUsController@list_process"]);

// Route::get('/logout', function () {
//     return view('clientside.page.map');
// })->name('admin.logout');
Route::get('dashboard', function () {
    return view('admin.pages.dashboard');
})->name('dashboard');

Route::get('/client/dashboard',function(){
    return view('clientdash.pages.dashboard');
})->name('/client/dashboard');

