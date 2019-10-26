<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Property;
use App\Expense;
use App\Unit;
use App\User;
use App\Sale;
use App\Helper;
use Carbon\Carbon;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total_country = Country::count();
        $total_property = Property::count();
        $total_unit = Unit::count();
        $total_user = User::count();

        #calculate daily & monthly expense
        $daily_expenses = Expense::whereDate('expense_date',  date('Y-m-d'))->pluck('expense');
        $daily_total_expense = Helper::calulate_total_expense($daily_expenses);
        $monthly_expenses = Expense::whereMonth('expense_date',  date('m'))->pluck('expense');
        $monthly_total_expense = Helper::calulate_total_expense($monthly_expenses);

        #count units sold today & this month
        $count_units_sold_today = Sale::whereDate('created_at', today())->count();
        $count_units_sold_this_month = Sale::whereMonth('created_at', today())->count();
        $count_units_sold_this_year = Sale::whereYear('created_at', today()->year)->count();

        #calculate ratio
        $units_in_this_month = $total_unit * Carbon::now()->daysInMonth; #number of units * number of days in current month
        $units_in_this_year = $total_unit * Helper::get_days_passed(); #total units * number of days till now
        $ratio_today = ($count_units_sold_today > 0 && $total_unit > 0) ? round(100 * $count_units_sold_today / $total_unit, 2) : 0;
        $ratio_this_month = ($count_units_sold_this_month > 0 && $units_in_this_month > 0) ? round(100 * $count_units_sold_this_month / $units_in_this_month, 2) : 0;
        $ratio_this_year = ($count_units_sold_this_year > 0  && $units_in_this_year > 0) ? round(100 * $count_units_sold_this_year / $units_in_this_year, 2) : 0;

        #sales
        $todays_sale_card = Sale::Total_sales_by_payment_type('Card', 'today');
        $todays_sale_cash = Sale::Total_sales_by_payment_type('Cash', 'today');
        $todays_sale_cheque = Sale::Total_sales_by_payment_type('Cheque', 'today');
        $monthly_sale_card = Sale::Total_sales_by_payment_type('Card', 'monthly');
        $monthly_sale_cash = Sale::Total_sales_by_payment_type('Cash', 'monthly');
        $monthly_sale_cheque = Sale::Total_sales_by_payment_type('Cheque', 'monthly');
        //dd($monthly_sale_cash);
        return view('report.dashboard')->with([
            'total_country' => $total_country,
            'total_property' => $total_property,
            'total_unit' => $total_unit,
            'total_user' => $total_user,
            'ratio_today' => $ratio_today,
            'ratio_this_month' => $ratio_this_month,
            'ratio_this_year' => $ratio_this_year,
            'daily_expense' => $daily_total_expense,
            'monthly_expense' =>$monthly_total_expense,
            'todays_sale_card' => $todays_sale_card,
            'todays_sale_cash' => $todays_sale_cash,
            'todays_sale_cheque' => $todays_sale_cheque,
            'monthly_sale_card' => $monthly_sale_card,
            'monthly_sale_cash' =>  $monthly_sale_cash,
            'monthly_sale_cheque' =>  $monthly_sale_cheque,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
