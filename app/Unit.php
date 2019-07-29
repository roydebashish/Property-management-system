<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = ['is_vacant','unit_no','property_id'];

    /*
    *relation between unit to property
    */
    public function property()
    {
        return $this->belongsTo('App\Property');
    }
    
     /*
    *relation between unit to sale
    */
    public function sale()
    {
        return $this->hasMany('App\Sale');
    }
}
