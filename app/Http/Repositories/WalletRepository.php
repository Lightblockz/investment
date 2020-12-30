<?php

namespace App\Http\Repositories;

use App\InvestmentPlan;
use DB;
use App\User;
use App\Wallet;
use App\BankAccount;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;

class WalletRepository
{

    public function create($request)
    {
        $wallet_tag = 0;

        do {

            $id = Str::random(5);

            $prefix = substr($request->first_name, 0, 2);

            $wallet_id = strtoupper($prefix ."-" . $id . "-" . $wallet_tag);

            $wallet_tag++;

        } while ($this->walletExists($wallet_id));

        $create_wallet = Wallet::create([
            'user_id' => $request->user_id,
            'wallet_id' => $wallet_id,
        ]);
        
        if ($create_wallet) {
            
            return $create_wallet;

        }

        return false;

    }

    public function walletExists($wallet_id)
    {
        
        return Wallet::where('wallet_id', $wallet_id)->exists();

    }

    
}
