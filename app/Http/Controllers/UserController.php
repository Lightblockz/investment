<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\UserRepository;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Mail\VerificationMail;
use App\Mail\ResetPasswordMail;

class UserController extends Controller
{

    private $user;

    public function __construct (UserRepository $user)
    {
        $this->user = $user;
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
        echo Auth::user()->email;
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
    
}
