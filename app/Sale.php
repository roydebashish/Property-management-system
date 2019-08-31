<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use SoftDeletes;
    protected $fillable = ['voucher_no','member_id','property_id','unit_id','sale_amount','payment_method'];
    
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
    
    /*
    *relation between sale to member
    */
    public function member()
    {
        return $this->belongsTo('App\Member');
    }
}
