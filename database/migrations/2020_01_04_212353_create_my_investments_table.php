<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyInvestmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_investments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('user_id' , 100);
            $table->bigInteger('investment_plan_id')->unsigned();
            $table->string('reference_id' , 100);
            $table->string('duration' , 100);
            $table->bigInteger('amount');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->dateTime('last_processed_date')->nullable();
            $table->double('interest', 3, 2);
            $table->bigInteger('expected_monthly_interest')->nullable();
            $table->bigInteger('interest_paid')->nullable();
            $table->bigInteger('expected_total_interest')->nullable();
            $table->bigInteger('total_withdrawable_amount')->nullable();
            $table->string('status' , 100)->default('Ongoing');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('investment_plan_id')->references('id')->on('investment_plans');
            $table->foreign('reference_id')->references('reference_id')->on('transactions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('my_investments');
    }
}
