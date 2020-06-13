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
    return view('welcome');
});Route::get('/update', function () {
    return view('editaddress');
});
Route::post("/ser", "searchController@index")->name("ser");
Route::post("/serpin", "searchController@indexpin");
Route::post("/ser/store", "searchController@store");

route::get('/get', 'searchController@get');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

