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

Route::get('/', 'App\Http\Controllers\PagesController@getHome')->name('home');


Route::get('/product', 'App\Http\Controllers\PagesController@getProduct')->name('product');

Route::get('/product/{id}', 'App\Http\Controllers\PagesController@getProductDetail');

Route::get('/login', 'App\Http\Controllers\PagesController@getLogin')->name("login");
Route::post('/login', 'App\Http\Controllers\PagesController@postLogin');
Route::get('/logout', 'App\Http\Controllers\PagesController@getLogout')->name("logout");

Route::post('/search', 'App\Http\Controllers\PagesController@postSearch');

Route::get('/typeProduct/{id}', 'App\Http\Controllers\PagesController@getTypeProduct')->name("typeProduct");


Route::get('/resgister', 'App\Http\Controllers\PagesController@getResgister')->name("resgister");
Route::post('/resgister', 'App\Http\Controllers\PagesController@postResgister')->name("postResgister");

Route::get('/admin', 'App\Http\Controllers\PagesController@getAdmin')->name('admin');
Route::get('/adminType', 'App\Http\Controllers\PagesController@getAdminType')->name('adminType');
Route::get('/adminUser', 'App\Http\Controllers\PagesController@getAdminUser')->name('adminUser');

Route::post('/searchAd', 'App\Http\Controllers\PagesController@postSearchAd');