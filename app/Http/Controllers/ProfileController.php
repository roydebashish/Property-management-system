<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use File;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('profile.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('profile.edit')->with('user', $user);
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
        $user = User::findOrFail($id);
        $messages = [
            'name.required' => 'Enter name',
            'email.required' => 'Enter valid email',
            'email.email' => 'Invalid email',
            'email.unique' => 'Email already taken',
            'phone.required' => 'Enter phone number',
            'user_photo.mimes' => 'Allowed files jpg, jpeg & png',
            'user_photo.dimensions' => 'File size: 150 X 150 px'
        ]; 
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => 'required',
            'user_photo' => 'nullable|mimes:jpg,jpeg,png|max:200|dimensions:max_width=150,max_height=150'
        ], $messages);
        #upload user pic  
        if($request->hasFile('user_photo')){
            $destinationPath = public_path().'/uploads/user';
            
            #remove previous file
            if (File::exists(public_path().'/uploads/user/'. $user->user_photo)) {
                File::delete(public_path().'/uploads/user/'. $user->user_photo);
            }
            $file       = $request->user_photo;
            $extension  = $file->getClientOriginalExtension();
            //$actual_title   = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $user_photo    = md5(time()).'.'.$extension;
            $file->move($destinationPath, $user_photo);
            #attach image url
            $user->user_photo  = $user_photo;
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');

        $user->save();
       
        return redirect()->route('profile.show',['id' => $user->id])->with('success', "Profile Updated");
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
