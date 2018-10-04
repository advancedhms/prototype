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

Route::middleware(['auth'])->group(function () {
    Route::get('/', 'hmsController@admin');
    Route::get('/patient', 'HomeController@patient')->name('patient');
    Route::get('/pharm', 'HomeController@pharm')->name('pharm');
});


Auth::routes();


