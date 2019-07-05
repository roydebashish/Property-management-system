<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = ['unit_no','property_id'];

    /*
    *relation between unit to property
    */
    public function property()
    {
        return $this->belongsTo('App\Property');
    }
}
