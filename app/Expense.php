<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = ['unit_id', 'expense', 'expense_date'];
    /*
    *relation expense to unit
    */
    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }
}
