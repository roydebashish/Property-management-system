<?php 
namespace App;

use Auth;
use App\Country;
use App\Property;
use App\Unit;

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
        switch($key)
        {
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
                    return 'https://source.unsplash.com/ZHvM3XIOHoE/60x60';
                }
                return url('uploads/user').'/'.$authenticated_user->user_photo;
            default:
                return $authenticated_user;
        }
    }
     /**
     * count total daily  last voucher number  
     * @param array $expenses
     * return int $total expense
     */
    public static function calulate_total_expense($expenses)
    {
        $total = 0;

        if(!$expenses->isEmpty())
        {
            #loop through expense items
            foreach($expenses as $expense)
            {
                $expense_items = unserialize($expense);
                #sum amount
                if(is_array($expense_items))
                {
                    foreach($expense_items as $items){
                         $total += $items['amount'];
                    }
                }
               
            }
        }
        
        return $total;
    }
    
     /**
     * count total daily  last voucher number  
     * @param array $expenses
     * return int $total expense
     */
    public static function total_expense_day($expenses)
    {
        $total = 0;
        //dd(unserialize($expenses));
        if(!empty($expenses))
        {
            #loop through expense items
            
            foreach(unserialize($expenses) as $items)
            {
                $total += $items['amount'];
            }
        }
        //dd($total);
        return $total;
    }
    /**
     * get property name by id
     * @param int $id 
     */
    public static function get_property_name($id)
    {
        $property = Property::findOrFail($id)->first();
        return $property->property_name;
    }
    
     /**
     * get unit name by id
     * @param int $id 
     */
    public static function get_unit_name($id)
    {
        $unit = Unit::findOrFail($id)->first();
        return $unit->unit_no;
    }
    
     /**
     * get country  name by id
     * @param int $id 
     */
    public static function get_country_name($id)
    {
        $country = Country::findOrFail($id)->first();
        return $country->country_name;
    }
    
    /**
     * get days passed till current date in a year
     * @param int $id 
    */
    public static function get_days_passed()
    {
        $current_date = today();
        $total_days = 0;
        #calculate total days
        for($i = 1; $i < 8; $i++)
        {
            $total_days += cal_days_in_month(CAL_GREGORIAN, $i, $current_date->year);
        }
        #add current month's day
        $total_days += $current_date->day;
      
        return $total_days;
    }
   
}