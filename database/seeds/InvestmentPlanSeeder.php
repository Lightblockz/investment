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
            'title' => 'Express',
            'amount' => 300000,
            'interest' => 0.15,
        ]);

        InvestmentPlan::create([
            'title' => 'Diamond',
            'amount' => 1000000,
            'interest' => 0.10,
        ]);

        InvestmentPlan::create([
            'title' => 'Ivory',
            'amount' => 5000000,
            'interest' => 0.05,
        ]);

    }
}
