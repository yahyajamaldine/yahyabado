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


Auth::routes(); 


Route::get('/tabligh','App\Http\Controllers\MofawadController@tabligh')->name('tabligh');

Route::post('/tabligh','App\Http\Controllers\MofawadController@create_tabligh')->name('create_tabligh');

Route::get('/tanfid', 'App\Http\Controllers\MofawadController@tanfid')->name('tanfid');

Route::post('/tanfid','App\Http\Controllers\MofawadController@create_tanfid')->name('create_tanfid');

Route::get('/success','App\Http\Controllers\MofawadController@success')->name('success');

Route::get('/search','App\Http\Controllers\MofawadController@search')->name('search');

Route::post('/search','App\Http\Controllers\MofawadController@search')->name('search');

Route::get('/ijraa','App\Http\Controllers\MofawadController@ijraa')->name('ijraa');


Route::post('/ijraa','App\Http\Controllers\MofawadController@create_ijraa')->name('create_ijraa');

Route::get('/compute','App\Http\Controllers\MofawadController@compute')->name('compute');

Route::post('/compute','App\Http\Controllers\MofawadController@compute')->name('compute');

Route::post('/searchfor','App\Http\Controllers\MofawadController@searchfor')->name('searchfor');

Route::get('/login','App\Http\Controllers\AuthViewController@login')->name('login');

Route::post('/login','App\Http\Controllers\AuthViewController@loginCheck')->name('login.check');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/register','App\Http\Controllers\AuthViewController@register')->name('register');

Route::get('/modi/{type}/{id}','App\Http\Controllers\MofawadController@modification')->name('modi');

Route::post('/moditabligh/{id}','App\Http\Controllers\MofawadController@moditabligh')->name('moditabligh');

Route::post('/moditanfid/{id}','App\Http\Controllers\MofawadController@moditanfid')->name('moditanfid');

Route::post('/modiijraa/{id}','App\Http\Controllers\MofawadController@modiijraa')->name('modiijraa');

Route::delete('/delete/{type}/{id}','App\Http\Controllers\MofawadController@delete')->name('delete');

Route::post('/xls','App\Http\Controllers\MofawadController@xls')->name('xls');

Route::get('/','App\Http\Controllers\MofawadController@index')->name('index');
