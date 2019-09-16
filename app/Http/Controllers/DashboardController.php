<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Expense;
use App\Country;
use App\Property;
use App\Unit;
use App\Helper;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        #calucate dayly & monthly sale
        $daily_sale = Sale::whereDate('created_at', date('Y-m-d'))->sum('sale_amount');
        $monthly_sale = Sale::whereMonth('created_at', date('m'))->sum('sale_amount');
        //$yearly_sale = Sale::whereYear('created_at', date('Y'))->sum('sale_amount');

        #calculate daily & monthly expense
        // $daily_expenses = Expense::whereDate('expense_date',  date('Y-m-d'))->pluck('expense');
        // $daily_total_expense = Helper::calulate_total_expense($daily_expenses);
        $monthly_expenses = Expense::whereMonth('expense_date',  date('m'))->pluck('expense');
        $monthly_total_expense = Helper::calulate_total_expense($monthly_expenses);

        #gross profit
        $gross_profit = $monthly_sale - $monthly_total_expense;

        #calculate ratio
        $total_unit = Unit::count();
        $count_units_sold_today = Sale::whereDate('created_at', today())->count();
        $units_in_this_month = $total_unit * Carbon::now()->daysInMonth; #number of units * number of days in current month
        $units_in_this_year = $total_unit * Helper::get_days_passed(); #total units * number of days till now
        $ratio_today = ($count_units_sold_today > 0) ? round(100 * $count_units_sold_today / $total_unit, 2) : 0;

        return view('dashboard')->with([
            'daily_sale' => $daily_sale,
            'monthly_sale' => $monthly_sale,
            // 'daily_expense' => $daily_total_expense,
            'monthly_expense' => $monthly_total_expense,
            'gross_profit' => $gross_profit,
            'todays_ratio' => $ratio_today
        ]);
    }
}
