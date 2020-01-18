<?php

namespace App\Http\Repositories;

use App\InvestmentPlan;
use DB;
use App\User;
use App\Wallet;
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

        return DB::transaction(function() use ($request) {
            
           $emailExist =  $this->emailExist($request->email);

           if ($emailExist) {
               
                return false;

           }

           $id = Str::random(8);

           $prefix = substr($request->first_name, 0, 2);

           $wallet_id = strtoupper($prefix ."-" . $id);

           $token = substr(md5(time()), 0, 200);

           $create = User::create([
               'first_name' => $request->first_name,
               'last_name' => $request->last_name,
               'email' => $request->email,
               'password' => $request->password,
               'token' => $token,
           ]);

           $create_wallet = Wallet::create([
                'user_id' => $create->id,
                'wallet_id' => $wallet_id,
            ]);
           
           if ($create && $create_wallet) {
               
                return $create;

           }

            return false;

        });

    }

    public function fetchUserByToken($id , $token)
    {
        
        return DB::transaction(function() use ($id , $token) {
            
            $userExist =  User::whereId($id)->where('token' , $token)->first();
 
            if ($userExist == null) {
                
                 return false;
 
            }

            Auth::login($userExist, true);

            $update = $userExist->update([
                'token' => '',
                'email_verified_at' => Carbon::now()->toDateTimeString(),
                'last_login' => Carbon::now()->toDateTimeString()
            ]);

            return true;
            
         });

    }

    public function fetchUserByTokenForPasswordReset($email , $token)
    {
        
        return DB::transaction(function() use ($email , $token) {
            
            $userExist =  User::whereEmail($email)->where('token' , $token)->first();
 
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
                'token' => '',
                'password' => $request->password,
                'last_login' => Carbon::now()->toDateTimeString()
            ]);

            if ($update) {
               
                Auth::login($user, true);

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
                ->find(Auth::user()->id);

        // dd($user);
        return $user;
    }

}
