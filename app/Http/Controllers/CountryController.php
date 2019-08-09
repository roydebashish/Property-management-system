<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('country.countries')->with('countries', Country::all());
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
            'country_name' => 'required|unique:countries,country_name'
        ],[
            'country_name.required' => 'Enter Country Name',
            'country_name.unique' => 'Country Already Exists'
        ]);
        if($validate->fails()){
          // dd($validate->errors()->first('country_name')); 
           return back()->with('warning', $validate->errors()->first('country_name'));
        }
        $country = Country::create($request->all());
        return back()->with('success', "\"$country->country_name\"added to country list");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        dd('show request');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        dd('edit request');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //return $request->input('country_id');
        $validate = validator::make($request->all(),[
            'country_name' => 'required|unique:countries,country_name,'.$request->input('country_id')
        ],[
            'country_name.required' => 'Enter Country Name',
            'country_name.unique' => 'Country Already Exists'
        ]);
        
        $message = '';
        $status = false;
        
        if($validate->fails()){
           $message = $validate->errors()->first('country_name');
        }else{
            $country = Country::find( $request->input('country_id'));
            if($country)
            {
                $country->country_name = $request->input('country_name');
                $country->save();
                $message = 'Country Updated';
                $status = true;
            }else{
                 $message = 'Country not found. Try some time later.';
            }
        }
        $data = [
            'status' => $status,
            'msg' => $message
        ];
        return response($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();
        return back()->with('success', "Country deleted");
    }
}
