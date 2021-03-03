<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradeSignalsSubscriptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trade_signals_subscriptions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('email' , 100);
            $table->string('phone' , 100)->nullable();
            $table->bigInteger('signal_plan_id')->unsigned();
            $table->boolean('via_email' , 11)->default(1);
            $table->boolean('via_phone' , 11)->default(0);
            $table->string('duration' , 100);
            $table->string('start_date' , 100);
            $table->string('end_date' , 100);
            $table->bigInteger('amount_paid');
            $table->boolean('status' , 11)->default(0);
            $table->foreign('signal_plan_id')->references('id')->on('trade_signals_plan');
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
        Schema::dropIfExists('trade_signals_subscriptions');
    }
}
