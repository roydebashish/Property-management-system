<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Sale extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'voucher_no',
        'member_id',
        'property_id',
        'unit_id',
        'from_date',
        'to_date',
        'sale_amount',
        'payment_method',
        'created_at'
    ];

    /*
    *relation between sale to unit
    */
    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }

    /*
    *relation between sale to property
    */
    public function property()
    {
        return $this->belongsTo('App\Property');
    }

    /*
    *relation between sale to member
    */
    public function member()
    {
        return $this->belongsTo('App\Member');
    }

     /*
    *calculate total sales by payment type
    */
    public function scopeTotal_sales_by_payment_type($query, $payment_type, $report_type)
    {
        if($report_type == 'today')
        {
            return Sale::where('payment_method', $payment_type)
            ->whereDate('created_at', today())
            ->sum('sale_amount');
        }elseif($report_type == 'monthly'){
            return Sale::where('payment_method', $payment_type)
            ->whereMonth('created_at', date('m'))
            ->sum('sale_amount');
        }

    }
    /**
     * format created at date time before saving
    */
    public function setCreatedAtAttribute($value)
    {
        $current = Carbon::now();
        $date = $value.' '.$current->toTimeString();
        //dd($date);
        $this->attributes['created_at'] =  $current->parse($date);
    }
}
