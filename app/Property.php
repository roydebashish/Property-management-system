<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = ['property_name','country_id'];
    /*
    *relation between property to country
    */
    public function country()
    {
        return $this->belongsTo('App\Country');
    }

     /*
    *relation between property to unit
    */
    public function units()
    {
        return $this->hasMany('App\Unit');
    }
    
    /*
    *relation between unit to property
    */
    public function sale()
    {
        return $this->hasMany('App\Sale');
    }
}
