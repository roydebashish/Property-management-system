<?php 
namespace App;

use Auth;
use App\Miscellaneous;

/**
 * @Debashish Roy 
 * */
class Helper
{
    /**
     * @param string $key
     * return requested user data.  
     */
    public static function current_user($key=null)
    {
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
                if(!$authenticated_user->user_photo)#return default link
                {
                    return 'https://source.unsplash.com/QAB-WJcbgJk/60x60';
                }
                return $authenticated_user->user_photo;
            default:
                return $authenticated_user;
        }
    }
    /**
     *
     * return last voucher number  
     */
    public static function voucher_serial()
    {
        $serial = Miscellaneous::where('option_name', 'voucher_serial')->first();
        return $serial->option_value;
    }
    /**
     * update last  voucher number 
     * return updated voucher number or false on failure 
     */
    public static function update_voucher_serial()
    {
        #update
        Miscellaneous::where('option_name', 'voucher_serial')->increment('option_value',1);
        $serial = Miscellaneous::where('option_name', 'voucher_serial')->pluck('option_value');
        return $serial[0];
    }
}