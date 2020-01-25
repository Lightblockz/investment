<?php

namespace App\Console\Commands;

use App\MyInvestment;
use App\Wallet;
use App\Http\Repositories\InvestmentLogRepository;
use Carbon\Carbon;
use DB;
use Illuminate\Console\Command;

class ProcessTransactionDaily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'process:transaction';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process Daily Transactions';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        
        $today = Carbon::today();

        $last_month = $today->subMonth();

        $yesterday = Carbon::yesterday();

        // dd($yesterday);

        // Get all investments that qualifies for monthly processing
        $investments = MyInvestment::where('last_processed_date' , $yesterday)->where('status' , 'Ongoing')->get();

        DB::transaction(function() use ($investments) {
            
            $today = Carbon::today();

            //Process interest for all ongoing investments for this day of month
            foreach ($investments as $key => $investment) {
            
                $interest_to_be_paid = ($investment->amount * $investment->interest);

                $previous_amount = $investment->interest_paid;

                $interest_to_be_paid = $investment->interest_paid + $interest_to_be_paid;

                $updateInvestment = MyInvestment::whereId($investment->id)
                                                ->where('reference_id' , $investment->reference_id)
                                                ->update([
                                                    'last_processed_date' => $today,
                                                    'interest_paid' => $interest_to_be_paid
                                                ]);

                $wallet = Wallet::where('user_id' , $investment->user_id)->first();

                $balance = $wallet->available_balance + $interest_to_be_paid;

                $credit_wallet = $wallet->update(['available_balance' => $balance]);

                $investment_log = new InvestmentLogRepository();

                $data = [
                    'user_id' => $investment->user_id,
                    'investment_id' => $investment->id,
                    'reference_id' => $investment->reference_id,
                    'action' => "Montly interest paid",
                    'description' => "A record of the monthly interest payment was created",
                    'previous_amount' => $investment->interest_paid,
                    'current_amount' => $interest_to_be_paid,
                    'executed_by' => "Cron",
                    'executed_at' => Carbon::now()
                ];

                $data = (Object)$data;

                $investment_log->create($data);
            }

            //Check if investment has gotten to its end date... If yes, Close investment


            // dd($investments);

        });

    }
}
