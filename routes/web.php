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
Route::middleware(['auth'])->group(function () {
  Route::prefix('/prepaid-balance')->group(function () {
    Route::get('/','TopupController@index')->name('prepaid-balance.index');
    Route::post('/','TopupController@save')->name('prepaid-balance.save');
  }); 
  Route::prefix('/product')->group(function () {
    Route::get('/','ProductController@index')->name('product.index');
    Route::post('/','ProductController@save')->name('product.save');
  }); 
  Route::prefix('/success')->group(function () {
    Route::get('/','OrderController@index')->name('success.index');
    Route::post('/','OrderController@save')->name('success.save');
  }); 
});