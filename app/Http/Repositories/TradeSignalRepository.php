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

    public function createSignalSubscription($request)
    {
        return DB::transaction(function() use ($request) {

            $start_date = Carbon::now()->toDateString();

            $end_date = Carbon::now()->addMonth()->toDateString();

            $request = (Object)$request;
            
            $signal =  TradeSignalsSubscription::create([

                'email' => $request->email,
                'phone' => $request->phone,
                'signal_plan_id' => 1,
                'via_email' => $request->via_email,
                'via_phone' => $request->via_phone,
                'duration' => '30',
                'start_date' => $start_date,
                'end_date' => $end_date,
                'amount_paid' => $request->amount_paid
                
            ]);

            if ($signal) {
                return $signal;
            }

            return false;

         });
    }


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
