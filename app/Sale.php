<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['member_id','property_id','unit_id','is_released','sale_amount','payment_method'];
}
