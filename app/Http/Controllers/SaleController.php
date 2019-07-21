<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Country;
use App\Member;
use App\Unit;
use DB;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = DB::table('sales')
            ->join('units', 'units.id', 'sales.unit_id')
            ->join('properties','properties.id', 'sales.property_id')
            ->where('sales.is_released', 0)
            ->select('units.unit_no','properties.property_name', 'sales.is_released','sales.sale_amount','sales.payment_method','sales.id','sales.created_at')
            //->orderBy('trips.load_date','asc')
            ->get();
        //dd($sales);
        return view('sale.sales')->with('sales', $sales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::orderby('country_name', 'asc')->get();
        $members = Member::all();
        return view('sale.sale_create')->with(['countries'=> $countries,'members' => $members]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Sale::create($request->all());
        #update unit vacancy status
        Unit::where('id', $request->unit_id)->update(['is_vacant' => 0]);
        return back()->with('success', 'Sale created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
