<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestmentLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investment_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id' , 100);
            $table->string('investment_id' , 100);
            $table->string('reference_id' , 100);
            $table->string('action' , 100)->nullable();
            $table->string('description' , 100)->nullable();
            $table->integer('previous_amount')->nullable();
            $table->integer('current_amount')->nullable();
            $table->string('executed_by' , 100)->nullable();
            $table->dateTime('executed_at')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('investment_id')->references('id')->on('my_investments');
            $table->foreign('reference_id')->references('reference_id')->on('my_investments');
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
        Schema::dropIfExists('investment_logs');
    }
}
