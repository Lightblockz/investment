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

class InvestmentPlanRepository
{

    public function all()
    {
        return InvestmentPlan::all();
    }

    public function getInvestmentPlan($id)
    {
        return InvestmentPlan::findOrFail($id);
    }

}
