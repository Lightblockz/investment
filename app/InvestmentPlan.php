<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvestmentPlan extends Model
{
    
    /**
     * Get the myinvestments for the investment.
    */
    public function myInvestments()
    {
        return $this->hasMany('App\MyInvestment');
    }
    
}
