<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Country;
use App\Member;
use App\Unit;
use App\Helper;
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
        $total_sale = 0;
        $srch_title = '';
        $from_date =  !empty($request->input('from_date')) ? $request->from_date : '';
        $to_date = !empty($request->input('to_date')) ? $request->to_date : '';
        $property_id =  !empty($request->input('property_id')) ? $request->input('property_id') : '';
        $unit_id =  !empty($request->input('unit_id')) ? $request->input('unit_id') : '';
        $country_id =  !empty($request->input('country_id')) ? $request->input('country_id') : '';
        $country_name = !empty($country_id) ? Helper::get_country_name($country_id) : '';
        $property_name = !empty($property_id) ? Helper::get_property_name($property_id) : '';
        $unit_name = !empty($unit_id) ? Helper::get_unit_name($unit_id) : '';
        $countries = Country::all();
        
        #prepare search result title & total sale
        if(!empty($country_name) || !empty($property_name) || !empty($unit_name))
        {
            //$srch_title = 'Search: ';
            if(!empty($country_name)){
                $srch_title .= '<b>Country:</b> '.$country_name.' ';
            }
            if(!empty($property_name)){
                $srch_title .= '<b>Property:</b> '.$property_name.' ';
            }
            if(!empty($unit_name)){
                $srch_title .= '<b>Unit:</b> '.$unit_name.' ';
            }
            
            #sum total sale
            $total_sale = Sale::when($country_id, function($query) use ($country_id){
                    return $query->join('properties','properties.id', 'sales.property_id')
                        ->where('properties.country_id','=',  $country_id);
                })
                ->when($property_id, function($query) use ($property_id){
                    return $query->where('sales.property_id','=',  $property_id);
                })
                ->when($unit_id, function($query) use ($unit_id){
                    return $query->where('sales.unit_id','=',  $unit_id);
                })
                ->sum('sales.sale_amount');
                
        }
        
       // dd($property_id.' '.$unit_id);
        $sales = DB::table('sales')
            ->join('units', 'units.id', 'sales.unit_id')
            ->join('properties','properties.id', 'sales.property_id') 
            ->whereNull('sales.deleted_at')
            ->when($from_date, function($query) use ($from_date){
                return $query->whereDate('sales.created_at','>=', $from_date);
            })
            ->when($to_date, function($query) use ($to_date){
                return $query->whereDate('sales.created_at','<=',  $to_date);
            })
            ->when($country_id, function($query) use ($country_id){
                return $query->where('properties.country_id','=',  $country_id);
            })
            ->when($property_id, function($query) use ($property_id){
                return $query->where('sales.property_id','=',  $property_id);
            })
            ->when($unit_id, function($query) use ($unit_id){
                return $query->where('sales.unit_id','=',  $unit_id);
            })
            ->select('units.unit_no','properties.property_name','sales.sale_amount','sales.payment_method','sales.id','sales.created_at')
            ->oldest('sales.created_at')
            ->paginate(20);
        
        // $sales = Sale::all();
        // $sales->load('unit.property');
        // dd($sales);
       //dd($country_id);
        return view('sale.sales')->with([
            'sales'=> $sales,
            'from_date' => $from_date,
            'to_date' => $to_date,
            'countries' => $countries,
            'srch_title' => $srch_title,
            'total_sale' => $total_sale
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
        return view('sale.create')->with(['countries'=> $countries,'members' => $members]);
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
        $sale->delete();
        return back()->with('success', 'Sale deleted');
    }
}
