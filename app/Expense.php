<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = ['property_id','unit_id', 'expense', 'expense_date'];
}
