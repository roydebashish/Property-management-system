<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Property;
use App\Unit;

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
     *@param int $property_id
     * 1= vacant or 0 = not vacant
     * @return json
     */
    public function units($property_id, $is_vacant = null)
    {
        $units = Unit::where('property_id', $property_id)
            // ->where('is_vacant', $is_vacant)
            ->when($is_vacant, function($query, $is_vacant){
                return $query->where('is_vacant', $is_vacant);
            })
            ->get();
        $msg = count($units) > 0 ? '' : 'No Unit Found';
        return response([
            'units' => $units,
            'message' => $msg
        ], 200);
    }

}
