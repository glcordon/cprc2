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
Route::get('/', 'ClientController@index')->name('client.index');
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Route::get('/login',function(){return redirect('/admin/login');})->name('login');
Route::post('/login', 'LoginController@index')->name('login.action');

Route::group(['middleware' => 'web'], function () {
//Client Routes
Route::get('/test', function(){return 'hey';});
Route::get('/client', 'ClientController@index')->name('client.index');
Route::get('/client/inactive', 'ClientController@viewInactive')->name('client.viewInactive');
Route::get('/client/{id}/my', 'ClientController@myCaseload')->name('client.myindex');
Route::get('/client/{id}/edit', 'ClientController@edit')->name('client.edit');
Route::post('/client/{id?}/update', 'ClientController@update')->name('client.update');
Route::get('/client-add', 'ClientController@create')->name('client.create');
Route::post('/client-store', 'ClientController@store')->name('client.store');
Route::get('/client/contact/{id}', 'ClientController@show')->name('client.contact');
Route::post('/client/add-job', 'ClientController@updateJob')->name('client.updateJob');
Route::post('/client/delete-job', 'ClientController@deleteJob')->name('client.deleteJob');
Route::get('/delete-client/{id}', 'ClientController@destroy');
Route::post('/find-user', 'ClientController@findUser')->name('client.findUser');

Route::post('/add-note', 'NoteController@store')->name('note.add');
Route::post('/add-service', 'ClientController@addService');
Route::get('/report-generate', 'ReportController@index')->name('pdf');
Route::post('/report-generate', 'ReportController@index')->name('pdf_post');
Route::post('/participation-report', 'ReportController@participantReport')->name('participation_report');

});
