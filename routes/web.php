<?php

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
Auth::routes();
Route::get('/', function(){return view('welcome');});
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Route::get('/login',function(){return redirect('/admin/login');})->name('login');
Route::post('/login', 'LoginController@index')->name('login.action');

Route::group(['middleware' => 'web'], function () {
//Client Routes
Route::get('/test', function(){return 'hey';});
Route::get('/client', 'ClientController@index')->name('client.index');
Route::get('/client/{id?}', 'ClientController@myCaseload')->name('client.myindex');
Route::get('/client-add', 'ClientController@create')->name('client.create');
Route::post('/client-store', 'ClientController@store')->name('client.store');
Route::get('/client/contact/{id}', 'ClientController@show')->name('client.contact');

Route::get('/delete-client/{id}', 'ClientController@destory');

Route::post('/add-note', 'NoteController@store')->name('note.add');
Route::post('/add-service', 'ClientController@addService');
});
