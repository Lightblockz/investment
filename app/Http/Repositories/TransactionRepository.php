<?php

namespace App\Http\Repositories;

use App\Transaction;
use DB;
use App\User;
use App\Wallet;
use App\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;

class TransactionRepository
{

    public function create($request)
    {

        return DB::transaction(function() use ($request) {
            
            return Transaction::create([
                'user_id' => $request->user_id,
                'reference_id' => $request->reference_id,
                'amount' => $request->amount,
            ]);

         });

        
    }

}
