<?php

namespace App\Http\Repositories;

use DB;
use App\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserRepository{

    public function emailExist($email)
    {
        $emailExist = User::whereEmail($email)->exists();
        return $emailExist;
    }

    public function create($request)
    {

        return DB::transaction(function() use ($request) {
            
           $emailExist =  $this->emailExist($request->email);

           if ($emailExist) {
               
                return false;

           }

           $token = substr(md5(time()), 0, 200);

           $create = User::create([
               'first_name' => $request->first_name,
               'last_name' => $request->last_name,
               'email' => $request->email,
               'password' => $request->password,
               'token' => $token,
           ]);
           
           if ($create) {
               
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

}
