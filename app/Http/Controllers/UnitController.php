<?php

namespace App\Http\Controllers;

use App\Unit;
use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$units = Unit::all()->load('property.country'); 
        return view('unit.units')->with(['units' => Unit::all()->load('property.country'), 'properties' => Property::orderBy('property_name','asc')->get()]);
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
        //dd($request->all());
        $validate = validator::make($request->all(),[
            'property_id' => 'required|max:191',
            'unit_no' => 'required|max:191'
        ],[
            'property_id.required' => 'Select property not found',
            'property_id.max' => 'should not exceed 191 characters',
            'unit_no.required' => 'Unit name not found',
            'unit_no.max' => 'Unit name should not exceed 191 characters',
        ]);

        $messasge = '';
        if($validate->fails()){
            if($validate->errors->first('property_id')){
                $messasge .=$validate->errors->first('property_id').'.';
            }
            if($validate->errors->first('unit_no')){
                $messasge .= $validate->errors->first('unit_no');
            }
            return back()->with('warning', $messasge);
        }else{
            $check_if_exists = Unit::where('property_id', $request->input('property_id'))
                ->where('unit_no', $request->input('unit_no'))
                ->count();
            if($check_if_exists > 0){
                return back()->with('warning', $request->input('unit_no').' exists');
            }else{
                Unit::create($request->all());
                return back()->with('success', "New Unit added");
            } 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        $properties = Property::all();
        return view('unit.edit')->with([
            'unit' => $unit,
            'properties' => $properties        
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {   
      // dd($request->all());
        $this->validate($request, [
            'property_id' => 'required|max:20',
            'unit_no' => 'required|max:191|unique:units,unit_no,'.$unit->id
        ],[
            'property_id.required' => 'Select Property',
            'property_id.max' => 'Property ID should not exceed 20 characters',
            'unit_no.required' => 'Unit number is required',
            'unit_no.unique' => $request->input('unit_no').' has already been taken',
            'unit_no.max' => 'Unit number should not exceed 191 characters'
        ]);
        
        $unit->property_id = $request->input('property_id');
        $unit->unit_no = $request->input('unit_no');
        $unit->save();
        return back()->with('success', 'Unit updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();
        return back()->with('success', "Unit deleted");
    }
}
