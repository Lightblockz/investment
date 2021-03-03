<?php

namespace App\Http\Repositories;

use App\TradeSignals;
use App\TradeSignalsPlan;
use App\TradeSignalsSubscription;
use DB;
use App\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;

class TradeSignalRepository
{

    public function createTradeSignal($request)
    {

        return DB::transaction(function() use ($request) {

            $request = (Object)$request;
            
            $signal =  TradeSignals::create([

                'created_by' => Auth::user()->id,
                'coin_name' => $request->coin_name,
                'trade_action' => $request->trade_action,
                'trade_type' => $request->trade_type,
                'entry_point' => $request->entry_point,
                'exit_point' => $request->exit_point,
                'stop_loss' => $request->stop_loss,
                'image' => $request->image ?? '',
                'additional_info' => $request->additional_info
                
            ]);

            return $signal;

         });

    }

    public function unsentSignals()
    {
        return TradeSignals::where('sent', 0)->latest()->get();
    }

    public function getSignal($id)
    {
        return TradeSignals::findOrFail($id);
    }

    public function getSignalSubscribers()
    {
        return TradeSignalsSubscription::where('status', 1)->get(['email', 'phone']);
    }
    

}
