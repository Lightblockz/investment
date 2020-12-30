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
            'min_amount' => 180000,
            'max_amount' => 1999999,
            'interest' => 0.10,
        ]);

        InvestmentPlan::create([
            'title' => 'Silver',
            'min_amount' => 2000000,
            'max_amount' => 9999999,
            'interest' => 0.12,
        ]);

        InvestmentPlan::create([
            'title' => 'Gold',
            'min_amount' => 10000000,
            'max_amount' => 19999999,
            'interest' => 0.15,
        ]);

        InvestmentPlan::create([
            'title' => 'Exclusive',
            'min_amount' => 20000000,
            'max_amount' => 50000000,
            'interest' => 0.15,
        ]);
    }
}
