<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\InvestmentPlan;

class InvestmentPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        InvestmentPlan::create([
            'title' => 'Ivory',
            'amount' => 150000,
            'interest' => 0.15,
        ]);

        InvestmentPlan::create([
            'title' => 'Serif',
            'amount' => 300000,
            'interest' => 0.10,
        ]);

        InvestmentPlan::create([
            'title' => 'Silver',
            'amount' => 500000,
            'interest' => 0.05,
        ]);

        InvestmentPlan::create([
            'title' => 'Gold',
            'amount' => 1500000,
            'interest' => 0.05,
        ]);

        InvestmentPlan::create([
            'title' => 'Platinum',
            'amount' => 3000000,
            'interest' => 0.05,
        ]);

        InvestmentPlan::create([
            'title' => 'Exclusive',
            'amount' => 5000000,
            'interest' => 0.05,
        ]);

    }
}
