<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['member_name', 'phone', 'email', 'address', 'dob','country_id'];
    
    /**relation member to country */
    public function country(){
        return $this->belongsTo('App\Country');
    }
    
     /*
    *relation between member to sale
    */
    public function sale()
    {
        return $this->belongsTo('App\Sale');
    }
}
