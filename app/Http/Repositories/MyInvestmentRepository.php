<?php

namespace App\Http\Repositories;

use App\Transaction;
use App\MyInvestment;
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
            
            return MyInvestment::create([

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

         });

    }

}
