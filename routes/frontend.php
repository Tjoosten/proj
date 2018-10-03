<?php

/*
|--------------------------------------------------------------------------
| Web frontend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web frontend routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home.front');

// City Monitor routes
Route::get('/city-monitor', 'StadsMonitor\Front\IndexController@index')->name('city-monitor.front.index');