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

// Route::get('/', function () {
//     return view('pages.device');
// });

//Device
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::get('/device', 'HomeController@device');
Route::post('/device', 'HomeController@create');
Route::put('/device/{id}', 'HomeController@update');
Route::delete('/device/{id}', 'HomeController@delete');

//Trend
Route::get('/trend', 'HomeController@trend');