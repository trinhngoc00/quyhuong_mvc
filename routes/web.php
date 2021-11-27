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

//login
Route::get('/login', 'App\Http\Controllers\LoginController@getLogin')->name("login");
Route::post('/login', 'App\Http\Controllers\LoginController@postLogin');
Route::get('/logout', 'App\Http\Controllers\LoginController@getLogout')->name("logout");

//register
Route::get('/resgister', 'App\Http\Controllers\LoginController@getResgister')->name("resgister");
Route::post('/resgister', 'App\Http\Controllers\LoginController@postResgister')->name("postResgister");


//get product by ID
Route::get('/product/{id}', 'App\Http\Controllers\PagesController@getProductDetail');

//get product_type by ID
Route::get('/typeProduct/{id}', 'App\Http\Controllers\PagesController@getTypeProduct')->name("typeProduct");

//search by User
Route::post('/search', 'App\Http\Controllers\PagesController@postSearch');


//ADMIN
//get Admin pages
Route::get('/admin', 'App\Http\Controllers\AdminController@getAdmin')->name('admin');
Route::get('/adminType', 'App\Http\Controllers\AdminController@getAdminType')->name('adminType');
Route::get('/adminUser', 'App\Http\Controllers\AdminController@getAdminUser')->name('adminUser');

//search by Admin
Route::post('/searchAd', 'App\Http\Controllers\AdminController@postSearchAd');

//add product
Route::post('/addProduct', 'App\Http\Controllers\AdminController@postAddProduct');

//update product
Route::get('/updateProduct/{id}', 'App\Http\Controllers\AdminController@getUpdateProduct')->name("updateProduct");
Route::post('/updateProduct', 'App\Http\Controllers\AdminController@postUpdateProduct');