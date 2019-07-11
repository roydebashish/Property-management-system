<?php

namespace App\Http\Controllers;

use App\Member;
use App\Country;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::all()->load('country');
        return view('member.members')->with('members', $members);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::orderBy('country_name','asc')->get();
        return view('member.member_create')->with('countries', $countries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'member_name.required' => 'Enter member name',
            'email.email' => 'Invalid email address',
            'email.unique' => 'Email already taken',
            'phone.required' => 'Enter phone number',
            'phone.unique' => 'Phone number already taken',
            'dob.required' => 'Enter date of birth',
            'dob.before' => 'Must be a day beore today',
            'country_id.required' => 'Select country',
            'country_id.integer' => 'Selected country\'s ID not integer',
            'country_id.exists' => 'Selected country not found in database',
        ]; 
        $this->validate($request,[
            'member_name' => 'required',
            'email' => 'nullable|unique:members|email',
            'phone' => 'required|unique:members',
            'dob' => 'required|before:today',
            'address' => 'required',
            'country_id' => 'required|exists:countries,id'
        ], $messages);
        #create
        Member::create($request->all());
        return back()->with('success','New Member Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }
}
