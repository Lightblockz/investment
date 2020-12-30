<?php

namespace App\Http\Controllers;

use App\Http\Repositories\UserRepository;
use App\Http\Repositories\InvestmentPlanRepository;
use Illuminate\Http\Request;

class InvestmentPlanController extends Controller
{
    
    private $user;
    private $investment_plan;

    public function __construct (
                        UserRepository $user , 
                        InvestmentPlanRepository $investment_plan 
                    )
    {
        $this->user = $user;
        $this->investment_plan = $investment_plan;
    }

    public function isCapitalWithinInvestmentLimits($plan_id, $amount)
    {

        $fields = ['min_amount', 'max_amount'];

        $plan = $this->investment_plan->getInvestmentPlan($plan_id, $fields);

         $check = $this->investment_plan->isCapitalWithinInvestmentLimits($amount, $plan->min_amount, $plan->max_amount);

         $response = [
            'success' => $check,
            'data'    => $plan,
        ];

        return response()->json($response, 200);
  
    }

}
