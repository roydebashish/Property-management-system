<?php
Route::group(['middleware' => 'auth'], function () 
{
    Route::get('/', 'DashboardController@index');
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
    Route::resource('reports','ReportController');
    //Route::resource('ajaxRequests','AjaxRequestController');
    Route::get('users/change-password', 'UserController@change_password')->name('changePassword');
    Route::post('users/update-password', 'UserController@update_password')->name('updatePassword');
    
});

// disabled registration
Auth::routes(['register' => false]);

//ajax request routes
Route::get('/properties_by_country/{country_id}','AjaxRequestController@properties');
Route::get('/get_units_by_property/{property_id}/{is_vacant?}','AjaxRequestController@units');
Route::get('/get_expense_by_id/{expense_id}','AjaxRequestController@get_expenses_id');
Route::get('/get_country/{country_id}','AjaxRequestController@get_country');
Route::get('/country_has_property/{country_id}','AjaxRequestController@country_has_proterty');
Route::get('/property_has_unit/{property_id}','AjaxRequestController@property_has_unit');
Route::get('/unit_has_sales/{unit_id}','AjaxRequestController@unit_has_sales');
Route::post('/update_country','CountryController@update');
Route::post('/update_unit','UnitController@update');
