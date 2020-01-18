<?php

namespace App\Http\Repositories;

use App\Transaction;
use App\MyInvestment;
use App\InvestmentLog;
use DB;
use App\User;
use App\Wallet;
use App\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;

class MyInvestmentRepository
{

    public function create($request)
    {

        return DB::transaction(function() use ($request) {
            
            $investment =  MyInvestment::create([

                'user_id' => $request->user_id,
                'reference_id' => $request->reference_id,
                'amount' => $request->amount,
                'investment_plan_id' => $request->investment_plan_id,
                'duration' => $request->duration,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'last_processed_date' => $request->start_date,
                'interest' => $request->interest,
                'expected_monthly_interest' => $request->expected_monthly_interest,
                'interest_paid' => $request->interest_paid,
                'expected_total_interest' => $request->expected_total_interest,
                'total_withdrawable_amount' => $request->total_withdrawable_amount,

            ]);

             InvestmentLog::create([

                'user_id' => $request->user_id,
                'investment_id' => $investment->id,
                'reference_id' => $investment->reference_id,
                'action' => "Investment created",
                'description' => "An investment record has been created",
                'previous_amount' => 0,
                'current_amount' => $request->amount,
                'executed_by' => Auth::user()->id,

            ]);

            return $investment;
            

         });

    }

}
