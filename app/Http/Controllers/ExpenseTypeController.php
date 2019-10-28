<?php

namespace App\Http\Controllers;

use App\ExpenseType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExpenseTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin','accounts']);
        return view('expense.expense_types')->with('expense_types', ExpenseType::all()->sortBy('expense_type'));
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
         $validate = validator::make($request->all(),[
            'expense_type' => 'required|max:191|unique:expense_types,expense_type'
        ],[
            'expense_type.required' => 'Enter expense head',
            'expense_type.max' => 'Maximun 191 characters',
            'expense_type.unique' => 'Expense head exists',
        ]);

        if($validate->fails()){
           $message = $validate->errors()->first('expense_type');
           return back()->with('warning', $message);
        }else{
            ExpenseType::create($request->all());
            return back()->with('success', "New expense type added");
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ExpenseType  $expenseType
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseType $expenseType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ExpenseType  $expenseType
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpenseType $expenseType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ExpenseType  $expenseType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExpenseType $expenseType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ExpenseType  $expenseType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ExpenseType $expenseType)
    {
        $request->user()->authorizeRoles(['admin','accounts']);
        $expenseType->delete();
        return back()->with('success', "Expense head deleted");
    }
}
