<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenseType extends Model
{
    use SoftDeletes;
     
    protected $fillable = ['expense_type'];
}
