<?php 
namespace App;
use Auth;
class Helper
{
    /**
     * param string $key
     * return requested user data.  
     */
    public static function current_user($key){
        $authenticated_user = Auth::user();
        switch($key){
            case 'name':
                return $authenticated_user->name;
            case 'id':
                return $authenticated_user->id;
            case 'email':
                return $authenticated_user->email;
            case 'role':
                return $authenticated_user->user_role;
            case 'phone':
                return $authenticated_user->phone;
            case 'photo':
                return $authenticated_user->user_photo;
            default:
                return $authenticated_user;
        }
    }
}