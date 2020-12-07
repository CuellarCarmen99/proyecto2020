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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/config', 'UserController@config')->name('config');
Route::resource('product', 'ProductController');
Route::resource('sale', 'SaleController');
Route::resource('rol', 'RolController');
Route::resource('provider', 'ProviderController');

Route::resource('category', 'CategoryController');
Route::resource('individual', 'IndividualController');
Route::resource('bill', 'BillController');



