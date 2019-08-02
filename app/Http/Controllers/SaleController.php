<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Country;
use App\Member;
use App\Unit;
use DB;
use DataTables;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $from_date = isset($request->from_date) ? $request->from_date : '';
        $to_date = isset($request->to_date) ? $request->to_date : '';
        //dd($from_date. $to_date);
        $sales = DB::table('sales')
            ->join('units', 'units.id', 'sales.unit_id')
            ->join('properties','properties.id', 'sales.property_id') 
            ->when($from_date, function($query) use ($from_date){
                return $query->whereDate('sales.created_at','>=', $from_date);
            })
            ->when($to_date, function($query) use ($to_date){
                return $query->whereDate('sales.created_at','<=',  $to_date);
            })
            ->select('units.unit_no','properties.property_name','sales.sale_amount','sales.payment_method','sales.id','sales.created_at')
            ->oldest('sales.created_at')
            ->paginate(20);
        // $sales = Sale::all();
        // $sales->load('unit.property');
        // dd($sales);
        return view('sale.sales')->with([
            'sales'=> $sales,
            'from_date' => $from_date,
            'to_date' => $to_date
        ]);
        // if ($request->ajax())
        // {
        //     $sales = Sale::all();
        //     $sales->load('unit.property');
        //     return Datatables::of($sales)
        //             ->addColumn('action', function($row){
        //                 $btn = '<a href="'.route("sales.show",["id" => $row->id]).'" class="btn btn-success btn-circle btn-sm">
        //                             <i class="fas fa-eye"></i>
        //                         </a>
        //                         <a href="'.route("sales.edit",["id" => $row->id]).'" class="btn btn-info btn-circle btn-sm">
        //                             <i class="fas fa-pencil-alt"></i>
        //                         </a>
        //                         <form class="d-md-inline-block" action="'.route("sales.destroy", ["id" => $row->id]).'" method="POST">
        //                         '.method_field("DELETE").csrf_field().'
        //                             <button type"submit" class="btn btn-danger btn-circle btn-sm">
        //                                 <i class="fas fa-trash"></i>
        //                             </button>
        //                         </form>';
        //                 return $btn;
        //             })
        //             ->rawColumns(['action'])
        //             ->make(true);
        //     }
        //     return view('sale.sales');
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
        //Unit::where('id', $request->unit_id)->update(['is_vacant' => 0]);
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
        $sale->load('property.country');
        $sale->load('unit');
        $sale->load('member');
        //dd($sale);
        return view('sale.detail')->with('sale', $sale);
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
