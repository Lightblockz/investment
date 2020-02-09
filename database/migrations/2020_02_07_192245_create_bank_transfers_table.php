<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_transfers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('user_id' , 100);
            $table->bigInteger('investment_plan_id')->unsigned();
            $table->string('reference_id' , 100);
            $table->string('duration' , 100);
            $table->bigInteger('amount');
            $table->double('interest', 3, 2);
            $table->string('image' , 100);
            $table->boolean('verified' , 11)->default(0);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('investment_plan_id')->references('id')->on('investment_plans');
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
        Schema::dropIfExists('bank_transfers');
    }
}
