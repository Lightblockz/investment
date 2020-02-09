<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\UserRepository;
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
use App\Mail\ResetPasswordMail;
use UxWeb\SweetAlert\SweetAlert;

class AdminController extends Controller
{

    private $user;
    private $investment_plan;
    private $transaction;
    private $my_investment;
    private $investment_log;
    private $bank_account;
    private $bank_transfer;

    public function __construct (
                        UserRepository $user , 
                        InvestmentPlanRepository $investment_plan , 
                        TransactionRepository $transaction, 
                        MyInvestmentRepository $my_investment,
                        InvestmentLogRepository $investment_log,
                        BankAccountRepository $bank_account,
                        BankTransferRepository $bank_transfer
                    )
    {
        $this->user = $user;
        $this->investment_plan = $investment_plan;
        $this->transaction = $transaction;
        $this->my_investment = $my_investment;
        $this->investment_log = $investment_log;
        $this->bank_account = $bank_account;
        $this->bank_transfer = $bank_transfer;
        
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

    
}
