<?php

namespace App\Http\Controllers;

use App\Expense;
use App\ExpenseType;
use App\Country;
use App\Helper;
use DB;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Expense::with('unit.property.country')->get();
       // $expenses->load('unit.property.country');
       // dd($expenses);
        return view('expense.expenses')->with('expenses', $expenses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expense_types = ExpenseType::all();
        $countries = Country::all();
        $voucher_serial = Helper::voucher_serial();
        //dd($voucher_serial);
        return view('expense.expense_create')->with([
            'exp_types' => $expense_types,
            'countries' => $countries,
            'voucher_serial' => $voucher_serial
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // $expense['items'] = $request->items; 
        // $expense['amounts'] = $request->amounts; 
        $expenses = [];
        $items = $request->input('items');
        $amounts = $request->input('amounts');
        $vouchers = $request->input('vouchers');
        #prepare items, voucher & amounts
        for($i = 0; $i < count($request->items); $i++){
            $expenses[] = ['item' => $items[$i], 'amount' => $amounts[$i], 'voucher' => $vouchers[$i]];
        }
        $data['expense'] = serialize($expenses) ;
        #remove unnecessary data
        unset($data['items']);
        unset($data['amounts']);
        unset($data['vouchers']);
        //dd($data);
        Expense::create($data);
        return back()->with('success', 'Expense Stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        $expenses = DB::table('expenses')
            ->join('units', 'units.id', 'expenses.unit_id')
            //->join('properties','properties.id', 'expenses.property_id')
           // ->join('countries','countries.id', 'properties.country_id')
            ->where('expenses.id', $expense->id)
            //->select('units.*','properties.*','countries.*','expenses.*')
            ->select('units.*','expenses.*')
            ->get();
        $expense->load('unit.property.country');
        //dd($expense);
        #prepare expenses data
        $expense_items = unserialize($expense->expense);
        $total_amount = Helper::total_expense_day($expense->expense);
        $expense_items =  unserialize($expense->expense);
        $expense->expense = $expense_items;
        
        return view('expense.detail')->with(['expense'=> $expense, 'total' => $total_amount]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        //
    }
}
