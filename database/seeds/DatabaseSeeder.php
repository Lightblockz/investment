<?php

use App\Models\InvestmentPlan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(InvestmentPlanSeeder::class);
    }
}
