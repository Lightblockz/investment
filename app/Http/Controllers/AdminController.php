<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\UserRepository;
use App\Http\Repositories\TradeSignalRepository;
use App\Http\Repositories\TransactionRepository;
use App\Http\Repositories\InvestmentPlanRepository;
use App\Http\Repositories\MyInvestmentRepository;
use App\Http\Repositories\InvestmentLogRepository;
use App\Http\Repositories\BankAccountRepository;
use App\Http\Repositories\BankTransferRepository;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Mail\VerificationMail;
use App\Mail\TradeSignalMail;
use App\Mail\ResetPasswordMail;
use UxWeb\SweetAlert\SweetAlert;
use App\Events\SignalEmail;

class AdminController extends Controller
{

    private $user;
    private $investment_plan;
    private $transaction;
    private $my_investment;
    private $investment_log;
    private $bank_account;
    private $bank_transfer;
    private $signal;

    public function __construct (
                        UserRepository $user , 
                        InvestmentPlanRepository $investment_plan , 
                        TransactionRepository $transaction, 
                        MyInvestmentRepository $my_investment,
                        InvestmentLogRepository $investment_log,
                        BankAccountRepository $bank_account,
                        BankTransferRepository $bank_transfer,
                        TradeSignalRepository $signal
                    )
    {
        $this->user = $user;
        $this->investment_plan = $investment_plan;
        $this->transaction = $transaction;
        $this->my_investment = $my_investment;
        $this->investment_log = $investment_log;
        $this->bank_account = $bank_account;
        $this->bank_transfer = $bank_transfer;
        $this->signal = $signal;
        
    }

    public function smsBootstrap($phones = [], $body)
    {
        $ebulk = [
            'url' => env('EBULK_SMS', false),
            'username' => env('EBULK_SMS_USERNAME', false),
            'key' => env('EBULK_SMS_KEY', false)
        ];

        $auth = new \stdClass();
        $auth->username = $ebulk['username'];
        $auth->apikey = $ebulk['key'];

        $message = new \stdClass();
        $message->sender = 'LightBlocks';
        $message->messagetext = $body;
        $message->flash = '0';

        $recipients = new \stdClass();
        $recipients->gsm = $phones;

        $setup = new \stdClass();
        $setup->auth = $auth;
        $setup->message = $message;
        $setup->recipients = $recipients;

        $payload = new \stdClass();
        $payload->SMS = $setup;

        

        try {

            $payload = json_encode($payload, TRUE);

            // dd($payload);
            
            $curl = curl_init();
            
            curl_setopt_array(
                $curl, array(
                  CURLOPT_URL => $ebulk['url'],
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => "",
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 30,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => "POST",
                  CURLOPT_POSTFIELDS => $payload,
                  CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json"
                ),
            ));
    
            $response = curl_exec($curl);
            $err = curl_error($curl);
            $response = Json_decode($response);
            curl_close($curl);
    
            if ($response == NULL) {
                return false;
            }else {
                return $response;
            }
    
          } catch (\Exception $e) {
    
          }

    }

    public function dashboard()
    {
        
        $pending_bank_transfer = $this->bank_transfer->pendingBankTransfer();
        // dd($pending_bank_transfer);
        return view('admin.dashboard' ,
            [
             'pending_bank_transfer' => $pending_bank_transfer
            ]
        );

    }

    public function createTradeSignal(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'coin_name' => 'required',
            'trade_action' => 'required',
            'trade_type' => 'required',
            'entry_point' => 'required',
            'exit_point' => 'required',
            'stop_loss' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput();
        }


        try {
            
            $signal = $this->signal->createTradeSignal($request->all());

            if ($signal) {

                return back()->withSuccess("Great! Transaction has been approved.");
                

            }

            return back()->withErrors("There was an error creating this trade signal. Please try again")->withInput();


        } catch(\Exception $e) {
            return back()->with('error', $e->getMessage());
        }

    }

    public function signal()
    {
        
        $pending_bank_transfer = $this->bank_transfer->pendingBankTransfer();

        return view('admin.dashboard' ,
            [
             'pending_bank_transfer' => $pending_bank_transfer
            ]
        );

    }

    public function unsentSignals()
    {
        
        $signals = $this->signal->unsentSignals();

        return view('admin.signal.unsent', [ 'signals' => $signals]);

    }

    public function getSignalSubscribers()
    {
        return $this->signal->getSignalSubscribers();
    }

    public function sendSignal($id)
    {
        ini_set('max_execution_time', '10000');

        $signal = $this->signal->getSignal($id);
        
        $subscribers = $this->getSignalSubscribers();

        $subscribers->chunk(70)->each(function ($users) use($signal) {

            $emails = [];
            $phones = [];


            foreach ($users as $user)
            {
                array_push($emails, $user->email);

                if ($user->phone) {

                    $phone = new \stdClass();
                    $phone->msidn = $user->phone;
                    $phone->msgid = $user->phone."_".Date('M').Date('d');

                    array_push($phones, $phone);
                }

            }

            event(new SignalEmail($signal, $emails));
            // Mail::to('chidi.nkwocha@54gene.com')->send(new TradeSignalMail($signal));

            $body = "Trade Type: {$signal->trade_type}; Trade Action: {$signal->trade_action}; Coin: {$signal->coin_name}; Entry Point: {$signal->entry_point}; Exit Point: {$signal->exit_point}; Stop Loss: {$signal->stop_loss}";

            // $ebulk  = $this->smsBootstrap($phones, $body);

        //    if (!$ebulk->response->status) {
               
        //         return back()->withErrors("There was an error sending this signal. If this issue persist, please contact the tech team.");

        //    }


        });

        return redirect()->intended('/admin/trade/signals/unsent')->withSuccess('Great! Trade signal was sent successfully');

        ini_set('max_execution_time', '120');

        // dd($subscribers);
    }

    
}
