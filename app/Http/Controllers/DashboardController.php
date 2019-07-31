<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Expense;
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
        $daily_sale = Sale::whereDate('created_at', date('Y-m-d'))->sum('sale_amount');
       
        $monthly_sale = Sale::whereMonth('created_at', date('m'))->sum('sale_amount');
        //$yearly_sale = Sale::whereYear('created_at', date('Y'))->sum('sale_amount');
        #calculate daily expense
        $daily_expenses = Expense::whereDate('expense_date',  date('Y-m-d'))->pluck('expense');
        $daily_total_expense = 0;
        if($daily_expenses){
            foreach($daily_expenses as $items){
                $expense = unserialize($items);
                $daily_total_expense += array_sum($expense['amounts']);
            }
        }
        #calculate monthly expense
        $monthly_expenses = Expense::whereMonth('expense_date',  date('m'))->pluck('expense');
        $monthly_total_expense = 0;
        if($monthly_expenses){
            foreach($monthly_expenses as $items){
                $expense = unserialize($items);
                $monthly_total_expense += array_sum($expense['amounts']);
            }
        }
        #grows profit
        $gross_profit = $monthly_sale - $monthly_total_expense;
        
        return view('dashboard')->with([
            'daily_sale' => $daily_sale,
            'monthly_sale' => $monthly_sale,
            'daily_expense' => $daily_total_expense,
            'monthly_expense' => $monthly_total_expense,
            'gross_profit' => $gross_profit
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
