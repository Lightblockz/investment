<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\TradeSignalRepository;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Mail\SubscriptionMail;
use App\Mail\AdminSubscriptionMail;
use UxWeb\SweetAlert\SweetAlert;
use DB;

class ApiController extends Controller
{

    private $signal;

    public function __construct (
                        TradeSignalRepository $signal
                    )
    {
        $this->signal = $signal;
        
    }


    public function createSignalSubscription(Request $request)
    {
       
        try {
            
            $subscribe = $this->signal->createSignalSubscription($request->all());

            if ($subscribe) {

                

                Mail::to($request->email)->send(new SubscriptionMail($request));

                Mail::to('chidi.nkwocha@54gene.com')->send(new AdminSubscriptionMail($request));

                return $this->sendResponse("", "Transaction successful");

            }

            return $this->sendError("Sorry! There was an error completing this transaction. Please try again.");



        } catch (\Exception $e) {

            return $this->sendError($e->getMessage());
            

        }

    }

}


