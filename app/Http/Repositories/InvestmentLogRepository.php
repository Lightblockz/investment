<?php

namespace App\Http\Repositories;

use App\InvestmentLog;
use App\MyInvestment;
use DB;
use App\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class InvestmentLogRepository
{

    public function create($request)
    {

        return DB::transaction(function() use ($request) {
            
            return InvestmentLog::create([

                'user_id' => $request->user_id,
                'investment_id' => $request->investment_id,
                'reference_id' => $request->reference_id,
                'action' => $request->action,
                'description' => $request->description,
                'previous_amount' => $request->previous_amount,
                'current_amount' => $request->current_amount,
                'executed_by' => $request->executed_by,
                'executed_at' => $request->executed_at

            ]);

         });

    }

}
