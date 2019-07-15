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



Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('dashboard');
    });
    Route::resource('dashboard', 'DashboardController');
    //Route::resource('dashboard','DashboardController');
    Route::resource('countries','CountryController');
    Route::resource('property','PropertyController');
    Route::resource('expenseType','ExpenseTypeController');
    Route::resource('expenses','ExpenseController');
    Route::resource('units','UnitController');
    Route::resource('sales','SaleController');
    Route::resource('users','UserController');
    Route::resource('members','MemberController');
    //Route::resource('ajaxRequests','AjaxRequestController');
    
});
// disabled registration
Auth::routes(['register' => false]);
//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/properties_by_country/{country_id}','AjaxRequestController@properties');
Route::get('/get_units_by_property/{property_id}','AjaxRequestController@units');
