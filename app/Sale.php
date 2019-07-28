<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['member_id','property_id','unit_id','from_date','to_date','sale_amount','payment_method'];
}
