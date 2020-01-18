<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyInvestment extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 
        'reference_id', 
        'amount' , 
        'investment_plan_id' , 
        'duration' , 
        'status' , 
        'start_date' , 
        'end_date',
        'interest',
        'expected_monthly_interest',
        'interest_paid',
        'expected_total_interest',
        'total_withdrawable_amount'
    ];


    /**
     * Get the user that owns the investment.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the investment plan that owns the investment.
     */
    public function investmentPlan()
    {
        return $this->belongsTo('App\InvestmentPlan');
    }


}
