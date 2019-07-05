<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = ['property_name','country_id'];
    /*
    *relation between country to property
    */
    public function country()
    {
        return $this->belongsTo('App\Country');
    }
}
