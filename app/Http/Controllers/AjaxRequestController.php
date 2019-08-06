<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Property;
use App\Unit;
use App\Expense;

/**
 * Debashish Roy 
 * */
class AjaxRequestController extends Controller
{
    /**
     * list of properties by country id.
     *@param int $country_id
     * @return json
     */
    public function properties($country_id)
    {
        $properties = Property::where('country_id', $country_id)->get();
        $msg = count($properties) == 0 ? 'No Property Found' : '';
        return response([
            'properties' => $properties,
            'message' => $msg
        ], 200);
        
    }
    
     /**
     * list of units by property id.
     *@param int $property_id, int $is_vacant
     * 1 = vacant or 0 = not vacant
     * @return json
     */
    public function units($property_id)
    {
        $units = Unit::where('property_id', $property_id)->get();
        $msg = count($units) > 0 ? '' : 'No Unit Found';
        return response([
            'units' => $units,
            'message' => $msg
        ], 200);
    }
    /**
     * get expenses data by id of expense
     * @param int $id
     * @return json
     */
    public function get_expenses_id($id)
    {
        $expense = Expense::find($id);
        $msg = "";
        $status = "";
        if($expense)
        {
            $expense_items = unserialize($expense->expense);
            $expense_items =  array_combine($expense_items['items'], $expense_items['amounts']);
            return response([
                'items' => $expense_items 
            ], 200);
            
        }
        return response([
            'msg' => 'Internal Serve Error',
        ], 500);
        
    }

}
