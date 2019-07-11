<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['member_name', 'phone', 'email', 'address', 'dob','country_id'];
}
