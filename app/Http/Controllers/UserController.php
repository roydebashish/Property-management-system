<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('user.users')->with('users', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.user_create');
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
        $messages = [
            'name.required' => 'Enter valid name',
            'email.required' => 'Enter email',
            'email.email' => 'Email address not valid',
            'email.unique' => 'Email already taken',
            'phone.required' => 'Enter phone number',
            'user_role.required' => 'Select user role',
            'password.required'=> 'Enter password',
            'password.min'=> 'Minimum 6 characters',
            'password.same'=> 'Comfirm password does not match',
            'confirm.required' => 'Confirm password'
        ]; 
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'phone' => 'required',
            'user_role' => 'required',
            'password'=> 'required|min:6|same:confirm',
            'confirm' => 'required'
        ], $messages);
        
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);
       
        return back()->with('success', "New User <b>$user->name</b> Created");
        
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
