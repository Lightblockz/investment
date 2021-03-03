<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradeSignalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trade_signals', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('sent_by' , 100)->nullable();
            $table->string('created_by' , 100);
            $table->string('coin_name' , 100);
            $table->string('trade_type' , 100)->enum('SPOT', 'FUTURES');
            $table->string('trade_action' , 100)->enum('BUY', 'SELL');
            $table->string('entry_point' , 100);
            $table->string('exit_point' , 100);
            $table->string('stop_loss' , 100);
            $table->string('image' , 100)->nullable();
            $table->string('additional_info' , 100)->nullable();
            $table->integer('status')->default(1);
            $table->integer('sent')->default(0);
            $table->foreign('sent_by')->references('id')->on('users');
            $table->foreign('created_by')->references('id')->on('users');
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
        Schema::dropIfExists('trade_signals');
    }
}
