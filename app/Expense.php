<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['unit_id', 'expense', 'expense_date'];
    /*
    *relation expense to unit
    */
    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }
}
