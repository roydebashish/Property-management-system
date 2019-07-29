<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['member_id','property_id','unit_id','sale_amount','payment_method'];
    
     /*
    *relation between sale to unit
    */
    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }
    
    /*
    *relation between sale to property
    */
    public function property()
    {
        return $this->belongsTo('App\Property');
    }
}
