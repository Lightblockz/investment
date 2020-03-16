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
            'amount' => 180000,
            'interest' => 0.10,
        ]);

        InvestmentPlan::create([
            'title' => 'Ivory+',
            'amount' => 360000,
            'interest' => 0.10,
        ]);

        InvestmentPlan::create([
            'title' => 'Ivory+',
            'amount' => 540000,
            'interest' => 0.10,
        ]);

        InvestmentPlan::create([
            'title' => 'Serif',
            'amount' => 720000,
            'interest' => 0.10,
        ]);

        InvestmentPlan::create([
            'title' => 'Silver',
            'amount' => 900000,
            'interest' => 0.10,
        ]);

        InvestmentPlan::create([
            'title' => 'Gold',
            'amount' => 1080000,
            'interest' => 0.10,
        ]);

        InvestmentPlan::create([
            'title' => 'Platinum',
            'amount' => 1260000,
            'interest' => 0.10,
        ]);

        InvestmentPlan::create([
            'title' => 'Exclusive',
            'amount' => 1440000,
            'interest' => 0.10,
        ]);

        InvestmentPlan::create([
            'title' => 'Exclusive',
            'amount' => 1620000,
            'interest' => 0.10,
        ]);

        InvestmentPlan::create([
            'title' => 'Exclusive',
            'amount' =>1800000,
            'interest' => 0.10,
        ]);

        InvestmentPlan::create([
            'title' => 'Exclusive',
            'amount' => 2000000,
            'interest' => 0.10,
        ]);

        InvestmentPlan::create([
            'title' => 'Exclusive',
            'amount' => 3000000,
            'interest' => 0.10,
        ]);

        InvestmentPlan::create([
            'title' => 'Exclusive',
            'amount' => 5000000,
            'interest' => 0.10,
        ]);

    }
}
