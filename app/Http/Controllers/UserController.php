<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Auth;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('user_role', '!=', 'system')
            ->where('id','<>',Auth::user()->id)
            ->get();
        return view('user.users')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            //'email.required' => 'Enter email',
            'email.email' => 'Email address not valid',
            'email.unique' => 'Email already taken',
            'phone.required' => 'Enter phone number',
            'user_role.required' => 'Select user role',
            'password.required'=> 'Enter password',
            'password.min'=> 'Minimum 6 characters',
            'password.same'=> 'Comfirm password does not match',
            'confirm.required' => 'Confirm password',
            //'user_photo.mimes' => 'Allowed files jpg, jpeg & png',
            //'user_photo.dimensions' => 'File size: 150 X 150 px'
        ]; 
        $this->validate($request,[
            'name' => 'required',
            'email' => 'nullable|unique:users|email',
            'phone' => 'required',
            'user_role' => 'required',
            'password'=> 'required|min:6|same:confirm',
            'confirm' => 'required',
            //'user_photo' => 'nullable|mimes:jpg,jpeg,png|max:200|dimensions:max_width:150,max_height:150'
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
        $user = User::findOrFail($id);
        return view('user.details')->with('user',$user);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', "User deleted");
    }
    
     /**
     * change password form
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_password()
    {
        return view('profile.change_password');
    }
    
     /**
     * udate password 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_password(Request $request)
    {
       $this->validate($request,[
            'old_password' => 'required',
            'new_password' => 'required|min:8',
        ],[
            'old_password.required' => 'Enter Current Password',
            'new_password.required' => 'Enter New Password',
            'new_password.min' => 'At Least 8 Characters',
        ]);

        $message = '';
        if(Auth::check())
        {
            $current_password = Auth::User()->password;           
            if(Hash::check($request->input('old_password'), $current_password))
            {        
                $user_id = Auth::user()->id;                       
                $obj_user = User::find($user_id);
                $obj_user->password = Hash::make($request->input('new_password'));
                
                $update = $obj_user->save();

                if($update)
                    $message = 'Password Changed';
                else
                    $message = 'Internal error ocurred. Try some time later';
                
            }else{           
                $message = 'Current Password Does Not Match';
                
            }
        }

        return back()->with('success', $message);
    }
}
