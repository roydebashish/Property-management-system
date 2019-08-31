<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Expense;
use App\Country;
use App\Property;
use App\Unit;
use App\Helper;
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
        // $monthly_expenses = Expense::whereMonth('expense_date',  date('m'))->pluck('expense');
        // $monthly_total_expense = Helper::calulate_total_expense($monthly_expenses);
       
        #gross profit
        $gross_profit = $monthly_sale - $monthly_total_expense;
        
        return view('dashboard')->with([
            'daily_sale' => $daily_sale,
            'monthly_sale' => $monthly_sale,
            'daily_expense' => $daily_total_expense,
            'monthly_expense' => $monthly_total_expense,
            'gross_profit' => $gross_profit
        ]);
    }
}
