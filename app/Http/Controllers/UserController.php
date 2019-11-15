<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Auth;
use Hash;
use File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles('admin');

        $users = User::where('id','<>',Auth::user()->id)
            ->get();
        $users->load('roles');
        //dd($users);
        return view('user.users')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles('admin');

        return view('user.create')->with('roles', Role::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user()->authorizeRoles('admin');

        $messages = [
            'name.required' => 'Enter valid name',
            'email.required' => 'Enter email',
            'email.email' => 'Invalid email',
            'email.unique' => 'Email already taken',
            'phone.required' => 'Enter phone number',
            'phone.unique' => 'Phone number already taken',
            'user_role.required' => 'Select user role',
            'password.required'=> 'Enter password',
            'password.min'=> 'Minimum 6 characters',
            'password.same'=> 'Comfirm password does not match',
            'confirm.required' => 'Confirm password',
        ]; 
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|unique:users,email|email',
            'phone' => 'required|unique:users,phone',
            'user_role' => 'required',
            'password'=> 'required|min:6|same:confirm',
            'confirm' => 'required',
        ], $messages);
        
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        #upload user pic  
        if($request->hasFile('user_photo')){
            $destinationPath = public_path().'/uploads/user';
            
            if (!file_exists($destinationPath)) {
                 File::makeDirectory($destinationPath);
            }
            $file       = $request->user_photo;
            $extension  = $file->getClientOriginalExtension();
            //$actual_title   = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $user_photo    = md5(time()).'.'.$extension;
            $file->move($destinationPath, $user_photo);
            #attach profile url
            $data['user_photo']  = $user_photo;
        }
        $user = User::create($data);
        #attach user role
        $user_role = Role::findOrFail($data['user_role']);
        $user->roles()->attach($user_role);

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
        $user->load('roles');
        return view('user.details')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $user->load('roles');
        //dd($user->roles[0]->id);
        return view('user.edit')->with([
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
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
            'confirm.required' => 'Confirm password',
            'user_photo.mimes' => 'Allowed files jpg, jpeg & png',
            // 'user_photo.dimensions' => 'File size: 150 X 150 px'
        ]; 
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => 'required',
            'user_role' => 'required',
            'password'=> 'nullable|min:6|same:confirm',
            'confirm' => 'nullable',
            'user_photo' => 'nullable|mimes:jpg,jpeg,png|max:200'
        ], $messages);
        
        #upload user pic  
        if($request->hasFile('user_photo'))
        {
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
        if(!empty($request->input('password'))){
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        #update user role
        $user_role = \DB::table('role_user')
                    ->where('user_id', $user->id)
                    ->update(['role_id' => $request->input('user_role')]);
       
       
        return redirect()->route('users.index')->with('success', "New User <b>$user->name</b> Updated");
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,User $user)
    {
        $request->user()->authorizeRoles('admin');
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
