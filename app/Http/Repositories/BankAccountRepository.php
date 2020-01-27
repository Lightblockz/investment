<?php

namespace App\Http\Repositories;

use App\BankAccount;
use DB;
use App\User;
use App\Wallet;
use App\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;

class BankAccountRepository
{

    public function create($request)
    {

        return DB::transaction(function() use ($request) {
            
            $account =  BankAccount::create([

                'user_id' => Auth::user()->id,
                'bank_name' => $request->bank_name,
                'account_name' => $request->account_name,
                'account_number' => $request->account_number,
                'account_type' => $request->account_type,
                
            ]);

            return $account;
            

         });

    }

    public function delete($id)
    {

        return DB::transaction(function() use ($id) {
            
            $account =  BankAccount::where('id' , $id)->delete();

            if ($account) {
               
                return $account;

            }

            return false;
            
         });

    }

}
