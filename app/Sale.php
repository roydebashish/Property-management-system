<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['member_id','property_id','unit_id','sale_amount','payment_method'];
}
