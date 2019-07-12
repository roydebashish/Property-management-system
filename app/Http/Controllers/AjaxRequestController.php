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
        $properties = Property::where('country_id',$country_id)->get();
        return response([
            'properties' => $properties
        ], 200);
    }
    
     /**
     * list of units by property id.
     *@param int $property_id
     * @return json
     */
    public function units($property_id)
    {
        $units = Unit::where('property_id',$property_id)->get();
        return response([
            'units' => $units
        ], 200);
    }

}
