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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('countries','CountryController');
    Route::resource('property','PropertyController');
    Route::resource('expenses','ExpenseTypeController');
    Route::resource('units','UnitController');
});
// disabled registration
//Auth::routes(['register' => false]);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');