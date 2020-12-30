<?php

namespace App\Http\Repositories;

use App\InvestmentPlan;
use DB;
use App\User;
use App\Wallet;
use App\BankAccount;
use App\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;

class UserRepository
{

    public function emailExist($email)
    {
        $emailExist = User::whereEmail($email)->exists();
        return $emailExist;
    }

    public function tokenExist($token)
    {
        $tokenExist = User::where('token', $token)->exists();
        return $tokenExist;
    }

    public function initiatePasswordReset($email)
    {

        return DB::transaction(function() use ($email) {
            
            $token = substr(md5(time()), 0, 200);
            
            $userExist =  User::whereEmail($email)->first();

            $userExist->update([
                'token' => $token
            ]);

            if ($userExist) {
                
                return $userExist;

            }

            return false;
            
         });

    }

    public function create($request)
    {

        do {
            
            $token = substr(md5(time()), 0, 300);

        } while ($this->tokenExist($token));

        $create = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => $request->password,
            'token' => $token,
        ]);
        
        if ($create) {
            
            return $create;

        }

        return false;

    }

    public function fetchUserByToken($id , $token)
    {
        
        $userExist =  User::whereId($id)->where('token' , $token)->first();
 
        if ($userExist == null) {
            
                return false;

        }

        Auth::login($userExist, true);

        $update = $userExist->update([
            'token' => NULL,
            'verified' => 1,
            'email_verified_at' => Carbon::now()->toDateTimeString(),
            'last_login' => Carbon::now()->toDateTimeString()
        ]);

        // DD($update);

        return true;
    }

    public function fetchUserByTokenForPasswordReset($email , $token)
    {
        
        return DB::transaction(function() use ($email , $token) {
            
            $userExist =  User::whereEmail($email)->where('reset_token' , $token)->first();
 
            if ($userExist == null) {
                
                 return false;
 
            }

            return $userExist;
            
         });

    }

    public function updatePassword($request)
    {
        
        return DB::transaction(function() use ($request) {
            
            $user =  User::whereEmail($request->email)->first();
 
            if ($user == null) {
                
                 return false;
 
            }

            $update = $user->update([
                'reset_token' => NULL,
                'password' => $request->password,
                'last_login' => Carbon::now()->toDateTimeString()
            ]);

            if ($update) {
               
                // Auth::login($user, true);

                return true;

            }

            return false;
            
         });

    }

    public function getUserDetails()
    {

        $user = User::with('wallet')
                ->with('transactions')
                ->with('investments')
                ->with('bankAccount')
                ->with('bankTransfer')
                ->find(Auth::user()->id);

        // dd($user);
        return $user;
    }

    public function getBankAccount()
    {

        $user = User::with('bankAccount')
                ->find(Auth::user()->id);

        return $user;
    }

    public function coming($request)
    {
        
        return DB::transaction(function() use ($request) {
            
            $user =  DB::table('coming')->insert([
                'email' => $request->email
            ]);
 
            if (!$user) {
                
                 return false;
 
            }

            return true;
            
         });

    }
    
}
