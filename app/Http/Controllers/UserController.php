<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\UserRepository;
use App\Http\Repositories\TransactionRepository;
use App\Http\Repositories\InvestmentPlanRepository;
use App\Http\Repositories\MyInvestmentRepository;
use App\Http\Repositories\InvestmentLogRepository;
use App\Http\Repositories\BankAccountRepository;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Mail\VerificationMail;
use App\Mail\ResetPasswordMail;
use UxWeb\SweetAlert\SweetAlert;

class UserController extends Controller
{

    private $user;
    private $investment_plan;
    private $transaction;
    private $my_investment;
    private $investment_log;
    private $bank_account;

    public function __construct (
                        UserRepository $user , 
                        InvestmentPlanRepository $investment_plan , 
                        TransactionRepository $transaction, 
                        MyInvestmentRepository $my_investment,
                        InvestmentLogRepository $investment_log,
                        BankAccountRepository $bank_account
                    )
    {
        $this->user = $user;
        $this->investment_plan = $investment_plan;
        $this->transaction = $transaction;
        $this->my_investment = $my_investment;
        $this->investment_log = $investment_log;
        $this->bank_account = $bank_account;
        
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/signin');
    }

    public function create(Request $request)
    {
        
        try {
            
            $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'email' => 'required|unique:users|email|confirmed',
                'email_confirmation' => 'required|email',
                'password' => 'required|min:6',
            ]);

            if ($validator->fails()) {
                return back()
                ->withErrors($validator)
                ->withInput();
            }

            $createUser = $this->user->create($request);

            if (!$createUser) {
                return back()->withErrors("We are so sorry, your account could not be created. Please try again.");
            }

            if ($createUser) {

                Mail::to($createUser->email)->send(new VerificationMail($createUser));

                return view('success', ['email' => $request->email , 'name' => $request->first_name]);
            }

        } catch (\Throwable $th) {
            //throw $th;
        }

    }

    public function login(Request $request)
    {
        
        try {
            
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                return back()
                ->withErrors($validator)
                ->withInput();
            }

            $credentials = $request->only('email', 'password');

            

            if (Auth::attempt($credentials)) {
                
                // Authentication passed...
                return redirect()->intended('user/account/dashboard');

            }else {
                
                return back()
                ->withErrors("Incorrect Login Credentails");
                
            }

        } catch (\Throwable $th) {
            //throw $th;
        }

    }

    public function verifyEmail($id , $token)
    {
        
        try {
            
            $user = $this->user->fetchUserByToken($id,$token);

            if (!$user) {
                return abort(404);
            }

            return view('verified');

        } catch (\Throwable $th) {
            //throw $th;
        }

    }

    public function dashboard ()
    {

        $user = $this->user->getUserDetails();
        // dd($user);
        $plans = $this->investment_plan->all();
        $p_key = env('p_key');

        
        return view('user.dashboard' , ['user' => $user , 'plans' => $plans , 'p_key' => $p_key]);

    }

    public function BankAccount ()
    {

        $user = $this->user->getBankAccount();
        // dd($user);
        
        return view('user.account' , ['user' => $user]);

    }

    public function resetPassword (Request $request)
    {

        try {
            
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
            ]);

            if ($validator->fails()) {
                return back()
                ->withErrors($validator)
                ->withInput();
            }

            $email_exist = $this->user->emailExist($request->email);

            if (!$email_exist) {

                return back()
                    ->withErrors("Email address not found")
                    ->withInput();
            }
            
            $user = $this->user->initiatePasswordReset($request->email);

            if ($user) {

                Mail::to($user->email)->send(new ResetPasswordMail($user));

                return view('password_sent', ['name' => $user->first_name]);
            }

        } catch (\Throwable $th) {
            //throw $th;
        }

        
    }

    public function setPassword($email , $token)
    {

        $user = $this->user->fetchUserByTokenForPasswordReset($email , $token);

        if (!$user) {
            
            Auth::logout();

            return redirect()->intended('signin');

        }

        // return redirect()->intended('user/reset_password')->with(['email' , $email]);
        return view('reset_password' , ['email' => $email]);
    }

    public function updatePassword(Request $request)
    {
        
        try {

            $validator = Validator::make($request->all(), [
                'password' => 'required|confirmed|min:6',
                'password_confirmation' => 'required',

            ]);

            if ($validator->fails()) {
                return back()
                ->withErrors($validator)
                ->withInput();
            }

            $update_password = $this->user->updatePassword($request);

            if (!$update_password) {
                
                return back()->withErrors("Sorry! Your password could not be reset. Please try again.");

            }

            return redirect()->intended('user/account/dashboard');


        } catch (\Throwable $th) {
            //throw $th;
        }

    }
    

    public function invest(Request $request)
    {
        

        $start_date = Carbon::today();

        $date = Carbon::today();

        $end_date = $date->addDays($request->duration);

        $transaction = $this->transaction->create($request);

        $expected_monthly_interest = ($request->amount * $request->interest);

        $number_of_months = (integer)($request->duration / 30);

        $expected_total_interest = $expected_monthly_interest * $number_of_months;

        $total_withdrawable_amount = $request->amount + $expected_total_interest;

        $request->merge([
            "start_date"=> $start_date,
            "end_date"=> $end_date,
            "expected_monthly_interest"=> $expected_monthly_interest,
            "expected_total_interest"=> $expected_total_interest,
            "total_withdrawable_amount"=> $total_withdrawable_amount,
            "interest_paid"=> 0,
            
        ]);


        $my_investment = $this->my_investment->create($request);
        
    }

    public function coming(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:coming',
        ]);

        if ($validator->fails()) {
            return back()
            ->withErrors("We know you already. We have received your email before now.")
            ->withInput();
        }


        $save = $this->user->coming($request);

            if (!$save) {
                
                return back()->withErrors("Sorry! There was an error. Kindly try again");

            }

            return back()->withSuccess("Thank you. We will notify you when we go live");

    }
    

    public function saveBankAccount(Request $request)
    {
        
        try {

            $validator = Validator::make($request->all(), [
                'bank_name' => 'required',
                'account_name' => 'required',
                'account_number' => 'required',
                'account_type' => 'required',

            ]);

            if ($validator->fails()) {
                return back()
                ->withErrors($validator)
                ->withInput();
            }

            $add_account = $this->bank_account->create($request);

            if (!$add_account) {
                
                SweetAlert::error("Sorry! There was an error. Please try again."  , "");
                return back();

            }

            SweetAlert::success("Bank Account details has been added."  , "");

            return back();



        } catch (\Throwable $th) {
            //throw $th;
        }

    }

    public function deleteBankAccount($id)
    {
        $delete = $this->bank_account->delete($id);

        if (!$delete) {

            SweetAlert::error("Sorry! There was an error. Please try again.", 'Optional Title');
                
            return back();

        }

        SweetAlert::success("Bank Account deleted successfully.", "Bank Account deleted successfully.");

        return back();

    }

}
