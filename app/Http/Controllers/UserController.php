<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\UserRepository;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Mail\VerificationMail;

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

    
}
