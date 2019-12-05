<?php

namespace App\Http\Controllers;

use App\Property;
use App\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin','accounts']);
        $properties =Property::all()->load('country');
        //$properties->load('country');
        return view('property.properties')->with(['properties'=> $properties, 'countries' => Country::all()]);
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
        $request->user()->authorizeRoles(['admin','accounts']);
        $validate = validator::make($request->all(),[
            'country_id' => 'required',
            'property_name' => 'required|max:191'
        ],[
            'country_id.required' => 'Country not found',
            'property_name.required' => 'Property name not found',
            'property_name.max' => 'Property name should not exceed 191 characters',
        ]);

        $messasge = '';
        if($validate->fails()){
            if($validate->errors->first('country_id')){
                $messasge .=$validate->errors->first('country_id');
            }
            if($validate->errors->first('property_name')){
                $messasge .= '. '.$validate->errors->first('property_name');
            }
            return back()->with('warning', $messasge);
        }else{
            $check_if_exists = Property::where('country_id', $request->input('country_id'))
                ->where('property_name', $request->input('property_name'))
                ->count();
            if($check_if_exists > 0){
                return back()->with('warning', $request->input('property_name').' exists');
            }else{
                Property::create($request->all());
                return back()->with('success', 'New property added');
            }
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Property $property)
    {
        $request->user()->authorizeRoles(['admin','accounts']);
        $countries = Country::all();
        return view('property.edit')->with(['property' => $property, 'countries' => $countries]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        $request->user()->authorizeRoles(['admin','accounts']);
        $this->validate($request, [
            'country_id' => 'required',
            'property_name' => 'required|unique:properties,property_name,'.$property->id
        ]);
        
        $property->country_id = $request->input('country_id');
        $property->property_name = $request->input('property_name');
        $property->save();
        
        return redirect()->route('property.index')->with('success', 'Property Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Property $property)
    {
        //dd($request->all());
        $request->user()->authorizeRoles(['admin','accounts']);
        $property->delete();
        return back()->with('success', "Property deleted");
    }
}
