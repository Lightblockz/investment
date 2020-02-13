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
        // $request = json_encode($request->all());
        // $request = $request->all();
        // $request = collect($request);
        // $request = (object)$request;
        // var_dump($request->email);
        // die();
        // return $request;
        $mail = Mail::to($request->email)->send(new VerificationMail($request));
        return true;
    }

    
}
