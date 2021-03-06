<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Mail\VerificationMail;
use App\Mail\ResetPasswordMail;

class MailController extends Controller
{


    public function registrationMail(Request $request)
    {

        $mail = Mail::to($request->email)->send(new VerificationMail($request));
        return $this->sendResponse(true, 'Ok');

    }

    public function resetPassword(Request $request)
    {

        Mail::to($request->email)->send(new ResetPasswordMail($request));
        return $this->sendResponse(true, 'Ok');

    }

    

    
}
