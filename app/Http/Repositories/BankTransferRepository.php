<?php

namespace App\Http\Repositories;

use App\Transaction;
use App\MyInvestment;
use App\InvestmentLog;
use DB;
use App\User;
use App\BankTransfer;
use App\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;

class BankTransferRepository
{

    public function create($request)
    {

        return DB::transaction(function() use ($request) {

            $bank_transfer =  BankTransfer::create([

                'user_id' => $request['user_id'],
                'investment_plan_id' => (integer)$request['investment_plan_id'],
                'duration' => $request['duration'],
                'reference_id' => $request['reference_id'],
                'amount' => $request['amount'],
                'interest' => $request['interest'],
                'image' => $request['image'],
                
            ]);

            return $bank_transfer;
            
         });

    }

    public function pendingBankTransfer()
    {
        
        $bank_transfers = BankTransfer::where('bank_transfers.verified' , 0)
                            ->join('users' , 'bank_transfers.user_id', '=' , 'users.id')
                            ->join('investment_plans' , 'bank_transfers.investment_plan_id', '=' , 'investment_plans.id')
                            ->get([
                                '*',
                                'bank_transfers.id as id'
                            ]);
        // dd($bank_transfers);
        return $bank_transfers;

    }

    public function updateTransferStatus($request)
    {
        $bank_transfer = BankTransfer::whereId($request->id)->where('user_id' , $request->user_id)->where('reference_id' , $request->reference_id)->first();

        $bank_transfer->update([
            'verified' => 1
        ]);

        if ($bank_transfer) {
            return true;
        }

        return false;
    }

}
