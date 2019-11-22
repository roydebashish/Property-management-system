<?php

Route::group(['middleware' => 'auth'], function () 
{
    Route::get('users/change-password', 'UserController@change_password')->name('changePassword');
    Route::post('users/update-password', 'UserController@update_password')->name('updatePassword');
//    Route::post('users/update-password', 'UserController@update_password')->name('updatePassword');

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
    Route::resource('profile','ProfileController');
    #exports
    Route::group(['prefix' => 'exports'], function () 
    {
        Route::get('/sales','ExportController@export_sales')->name('exp_sales');
        Route::get('/expenses','ExportController@export_expenses')->name('exp_expenses');
        Route::get('/monthlySalesExpenses','ExportController@export_monthly_sales_expenses')->name('exp_monthly_sales_expenses');
    });
    //Route::resource('ajaxRequests','AjaxRequestController');
});

#disabled registration
Auth::routes(['register' => false]);

#ajax request routes
Route::get('/properties_by_country/{country_id}','AjaxRequestController@properties');
Route::get('/get_units_by_property/{property_id}/{is_vacant?}','AjaxRequestController@units');
Route::get('/get_expense_by_id/{expense_id}','AjaxRequestController@get_expenses_id');
Route::get('/get_country/{country_id}','AjaxRequestController@get_country');
Route::get('/country_has_property/{country_id}','AjaxRequestController@country_has_proterty');
Route::get('/property_has_unit/{property_id}','AjaxRequestController@property_has_unit');
Route::get('/unit_has_sales/{unit_id}','AjaxRequestController@unit_has_sales');
Route::get('/check_if_sale_date/{}','AjaxRequestController@check_if_sale_date'); //check if sale date available
Route::post('/update_country','CountryController@update');
Route::post('/update_unit','UnitController@update');

Route::get('/tt', function()
{
    // $current = Carbon::now();
    // $date = '2019-11-21 '.$current->toTimeString();
    // var_dump($current->parse($date));
});
