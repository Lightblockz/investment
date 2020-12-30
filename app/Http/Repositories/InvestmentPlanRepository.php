<?php

namespace App\Http\Repositories;

use App\InvestmentPlan;
use DB;
use App\User;
use App\Wallet;
use App\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;

class InvestmentPlanRepository
{

    public function all()
    {
        return InvestmentPlan::all();
    }

    public function getInvestmentPlan($id, $fields = '*')
    {
        return InvestmentPlan::select($fields)->whereId($id)->first();
    }

    public function isCapitalWithinInvestmentLimits($amount, $min_amount, $max_amount)
    {
        $amount = (int)$amount;
 
        return (($amount >= $min_amount) && ($amount <= $max_amount));
   
    }

}
