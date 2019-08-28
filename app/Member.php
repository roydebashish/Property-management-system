<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use SoftDeletes;
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
